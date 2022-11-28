<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlternativeValueModel;
use App\Models\CriteriaModel;
use App\Models\AlternativeModel;
use App\Models\FacilityModel;
use Illuminate\Support\Facades\DB;

class RecomendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['alternatives'] = AlternativeModel::all();
        return view('recomendation.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['alternative'] = AlternativeModel::with('gallery')->where('id', $id)->first();
        return view('recomendation.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter()
    {
        $data['alternatives'] = AlternativeModel::all();
        $data['criterias'] = CriteriaModel::with('criterion_value')->get();
        $data['facilities'] = FacilityModel::all();

        return view('recomendation.filter', $data);
    }

    public function search(Request $request)
    {
        /**
         * 1. Define devider
         */

        $deviders = DB::select("
            SELECT nilai_alternatif.id_kriteria AS id_kriteria,
                SUM(POW(nilai_kriteria.nilai, 2)) AS nilai
            FROM nilai_alternatif JOIN nilai_kriteria 
                ON nilai_alternatif.id_nilai_kriteria = nilai_kriteria.id 
            GROUP BY nilai_alternatif.id_kriteria;
        ");

        $devider = [];
        foreach ($deviders as $key => $value) {
            $nilai = sqrt($value->nilai);
            $data = array('id_kriteria' => $value->id_kriteria, 'nilai' => $nilai);
            array_push($devider, $data);
        }
        $total_devider = count($devider);

        /**
         * 2. Devide all alternative with devider
         */
        $alternative_value = [];
        $alternative_values = AlternativeValueModel::with('alternative')->with('criteria')->with('criterion_value')->get();
        $i = 0;
        foreach ($alternative_values as $key => $value) {
            $result_devider = $value->criterion_value->nilai / $devider[$i]['nilai'];
            $data_alternative = array('id_alternatif' => $value->id_alternatif, 'hasil_bagi' => $result_devider);
            array_push($alternative_value, $data_alternative);
            $i++;
            if ($i == $total_devider) {
                $i = 0;
            }
        }

        /**
         * 3. time with weight and override weight here
         */
        $alternative_after_multiple = [];
        $weight = [];
        $weight_criteria_id = [];
        $weights = $request->criterias;
        foreach ($weights as $key => $value) {
            $split = explode("#", $value);
            $nilai = $split[1];
            $nama_kriteria = CriteriaModel::find($value);
            $data_bobot = array('bobot' => $nilai, 'nama_kriteria' => $nama_kriteria->nama_kriteria);
            array_push($weight, $data_bobot);

            $weight_id = $split[0];
            $data_criteria_id = array('id_kriteria' => $weight_id);
            array_push($weight_criteria_id, $data_criteria_id);
        }

        $facility = $request->facility;
        $c3 = CriteriaModel::where('kode_kriteria', "C3")->first();
        if (count($facility) == 1) {
            $criterion_value = 1;
        } elseif (count($facility) == 2) {
            $criterion_value = 2;
        } elseif (count($facility) == 3) {
            $criterion_value = 3;
        } elseif (count($facility) == 4) {
            $criterion_value = 4;
        } elseif (count($facility) >= 5) {
            $criterion_value = 5;
        }

        $data_bobot1 = array('bobot' => $criterion_value, 'nama_kriteria' => $c3->nama_kriteria);
        array_push($weight, $data_bobot1);

        $data_criteria_id1 = array('id_kriteria' => $weight_id);
        array_push($weight_criteria_id, $data_criteria_id1);     

        $total_weigth = count($weight);
        $j = 0;
        foreach ($alternative_value as $key => $value) {
            $multiplication_result = $value['hasil_bagi'] * $weight[$j]['bobot'];
            $multiplication_data = array('id_alternatif' => $value['id_alternatif'], 'hasil_kali' => $multiplication_result);
            array_push($alternative_after_multiple, $multiplication_data);
            $j++;
            if ($j == $total_weigth) {
                $j = 0;
            }
        }

        /**
         * 4. Find ideal solution (A+) and (A-)
         */

        $total_alternative = AlternativeModel::count();
        $k = 0;
        for ($i = 0; $i < $total_weigth; $i++) {
            for ($j = 0; $j < $total_alternative; $j++) {
                $alternative[$i][] = $alternative_after_multiple[0 + $k]['hasil_kali'];
                $k = $k + 4;
            }
            $k = $i + 1;
        }

        foreach ($weight_criteria_id as $key => $value) {
            $find = CriteriaModel::where('id', $value['id_kriteria'])->first();
            // A+
            if ($find->jenis_kriteria == "Benefit") {
                $a_positive[] = max($alternative[$key]);
            } else {
                $a_positive[] = min($alternative[$key]);
            }

            // A-
            if ($find->jenis_kriteria == "Benefit") {
                $a_negative[] = min($alternative[$key]);
            } else {
                $a_negative[] = min($alternative[$key]);
            }
        }

        /**
         * 4. Find solution (D+) and (D-)
         */
        $l = 0;
        $d_solution = [];
        $d_positive = 0;
        $d_negative = 0;
        $id_alternatif_before = '';
        foreach ($alternative_after_multiple as $key => $value) {
            $id_alternatif = $value['id_alternatif'];
            $hasil_kali = $value['hasil_kali'];

            if ($key == 0) {
                $id_alternatif_before = $id_alternatif;
                $d_positive = $d_positive + pow($hasil_kali - $a_positive[$l], 2);
                $d_negative = $d_negative + pow($hasil_kali - $a_negative[$l], 2);
            } else {
                if ($id_alternatif_before == $id_alternatif) {
                    $d_positive = $d_positive + pow($hasil_kali - $a_positive[$l], 2);
                    $d_negative = $d_negative + pow($hasil_kali - $a_negative[$l], 2);
                } else {
                    $d_positive_push = sqrt($d_positive);
                    $d_negative_push = sqrt($d_negative);
                    $data_push = array('id_alternatif' => $id_alternatif_before, 'd_positif' => $d_positive_push, 'd_negatif' => $d_negative_push);
                    array_push($d_solution, $data_push);
                    $id_alternatif_before = $id_alternatif;
                    $d_positive = 0;
                    $d_negative = 0;
                    $d_positive = $d_positive + pow($hasil_kali - $a_positive[$l], 2);
                    $d_negative = $d_negative + pow($hasil_kali - $a_negative[$l], 2);
                }
            }
            $l++;
            if ($l == 4) {
                $l = 0;
            }
        }
        // Last record pushed
        $d_positive_push = sqrt($d_positive);
        $d_negative_push = sqrt($d_negative);
        $data_push = array('id_alternatif' => $id_alternatif_before, 'd_positif' => $d_positive_push, 'd_negatif' => $d_negative_push);
        array_push($d_solution, $data_push);


        /**
         * 4. Find preference result
         */

        $final_results = [];
        foreach ($d_solution as $key => $value) {
            $alternative_id = $value['id_alternatif'];
            $d_negative = $value['d_negatif'];
            $d_positive = $value['d_positif'];

            $final_result = $d_negative / ($d_negative + $d_positive);
            $final_push = array('id_alternatif' => $alternative_id, 'preferensi' => $final_result);
            array_push($final_results, $final_push);
        }

        /**
         * 5. Determine ranking
         */


        $n = count($final_results);
        // sort with buble sort
        for ($i = 0; $i < $n; $i++) {
            for ($j = $n - 1; $j > $i; $j--) {
                if ($final_results[$j]["preferensi"] > $final_results[$j - 1]["preferensi"]) {
                    $dummy = $final_results[$j];
                    $final_results[$j] = $final_results[$j - 1];
                    $final_results[$j - 1] = $dummy;
                }
            }
        }



        $data['devider'] = $devider;
        $data['alternative_values'] = $alternative_value;
        $data['weights'] = $weight;
        $data['alternative_after_multiple'] = $alternative_after_multiple;
        $data['a_positive'] = $a_positive;
        $data['a_negative'] = $a_negative;
        $data['d_solution'] = $d_solution;
        $data['final_results'] = $final_results;
        return view('recomendation.search_result', $data);
    }

    public function keyword(Request $request)
    {
        $keyword = $request->keyword;
        $data['alternatives'] = DB::select("
            SELECT * FROM alternatif 
            WHERE nama_alternatif LIKE '%$keyword%'
        ");
        return view('recomendation.keyword', $data);
    }

    public function all()
    {
        /**
         * 1. Define devider
         */

        $deviders = DB::select("
            SELECT nilai_alternatif.id_kriteria AS id_kriteria,
                SUM(POW(nilai_kriteria.nilai, 2)) AS nilai
            FROM nilai_alternatif JOIN nilai_kriteria 
                ON nilai_alternatif.id_nilai_kriteria = nilai_kriteria.id 
            GROUP BY nilai_alternatif.id_kriteria;
        ");

        $devider = [];
        foreach ($deviders as $key => $value) {
            $nilai = sqrt($value->nilai);
            $data = array('id_kriteria' => $value->id_kriteria, 'nilai' => $nilai);
            array_push($devider, $data);
        }
        $total_devider = count($devider);

        /**
         * 2. Devide all alternative with devider
         */
        $alternative_value = [];
        $alternative_values = AlternativeValueModel::with('alternative')->with('criteria')->with('criterion_value')->get();
        $i = 0;
        foreach ($alternative_values as $key => $value) {
            $result_devider = $value->criterion_value->nilai / $devider[$i]['nilai'];
            $data_alternative = array('id_alternatif' => $value->id_alternatif, 'hasil_bagi' => $result_devider);
            array_push($alternative_value, $data_alternative);
            $i++;
            if ($i == $total_devider) {
                $i = 0;
            }
        }

        /**
         * 3. time with weight
         */
        $alternative_after_multiple = [];
        $weight =  CriteriaModel::all();
        $total_weigth = count($weight);
        $j = 0;
        foreach ($alternative_value as $key => $value) {
            $multiplication_result = $value['hasil_bagi'] * $weight[$j]->bobot;
            $multiplication_data = array('id_alternatif' => $value['id_alternatif'], 'hasil_kali' => $multiplication_result);
            array_push($alternative_after_multiple, $multiplication_data);
            $j++;
            if ($j == $total_weigth) {
                $j = 0;
            }
        }

        /**
         * 4. Find ideal solution (A+) and (A-)
         */

        $total_alternative = AlternativeModel::count();
        $k = 0;
        for ($i = 0; $i < $total_weigth; $i++) {
            for ($j = 0; $j < $total_alternative; $j++) {
                $alternative[$i][] = $alternative_after_multiple[0 + $k]['hasil_kali'];
                $k = $k + 4;
            }
            $k = $i + 1;
        }

        foreach ($weight as $key => $value) {
            // A+
            if ($value->jenis_kriteria == "Benefit") {
                $a_positive[] = max($alternative[$key]);
            } else {
                $a_positive[] = min($alternative[$key]);
            }

            // A-
            if ($value->jenis_kriteria == "Benefit") {
                $a_negative[] = min($alternative[$key]);
            } else {
                $a_negative[] = min($alternative[$key]);
            }
        }

        /**
         * 4. Find solution (D+) and (D-)
         */
        $l = 0;
        $d_solution = [];
        $d_positive = 0;
        $d_negative = 0;
        $id_alternatif_before = '';
        foreach ($alternative_after_multiple as $key => $value) {
            $id_alternatif = $value['id_alternatif'];
            $hasil_kali = $value['hasil_kali'];

            if ($key == 0) {
                $id_alternatif_before = $id_alternatif;
                $d_positive = $d_positive + pow($hasil_kali - $a_positive[$l], 2);
                $d_negative = $d_negative + pow($hasil_kali - $a_negative[$l], 2);
            } else {
                if ($id_alternatif_before == $id_alternatif) {
                    $d_positive = $d_positive + pow($hasil_kali - $a_positive[$l], 2);
                    $d_negative = $d_negative + pow($hasil_kali - $a_negative[$l], 2);
                } else {
                    $d_positive_push = sqrt($d_positive);
                    $d_negative_push = sqrt($d_negative);
                    $data_push = array('id_alternatif' => $id_alternatif_before, 'd_positif' => $d_positive_push, 'd_negatif' => $d_negative_push);
                    array_push($d_solution, $data_push);
                    $id_alternatif_before = $id_alternatif;
                    $d_positive = 0;
                    $d_negative = 0;
                    $d_positive = $d_positive + pow($hasil_kali - $a_positive[$l], 2);
                    $d_negative = $d_negative + pow($hasil_kali - $a_negative[$l], 2);
                }
            }
            $l++;
            if ($l == 4) {
                $l = 0;
            }
        }
        // Last record pushed
        $d_positive_push = sqrt($d_positive);
        $d_negative_push = sqrt($d_negative);
        $data_push = array('id_alternatif' => $id_alternatif_before, 'd_positif' => $d_positive_push, 'd_negatif' => $d_negative_push);
        array_push($d_solution, $data_push);


        /**
         * 4. Find preference result
         */

        $final_results = [];
        foreach ($d_solution as $key => $value) {
            $alternative_id = $value['id_alternatif'];
            $d_negative = $value['d_negatif'];
            $d_positive = $value['d_positif'];

            $final_result = $d_negative / ($d_negative + $d_positive);
            $final_push = array('id_alternatif' => $alternative_id, 'preferensi' => $final_result);
            array_push($final_results, $final_push);
        }

        /**
         * 5. Determine ranking
         */


        $n = count($final_results);
        // sort with buble sort
        for ($i = 0; $i < $n; $i++) {
            for ($j = $n - 1; $j > $i; $j--) {
                if ($final_results[$j]["preferensi"] > $final_results[$j - 1]["preferensi"]) {
                    $dummy = $final_results[$j];
                    $final_results[$j] = $final_results[$j - 1];
                    $final_results[$j - 1] = $dummy;
                }
            }
        }

        $data['devider'] = $devider;
        $data['alternative_values'] = $alternative_value;
        $data['weights'] = $weight;
        $data['alternative_after_multiple'] = $alternative_after_multiple;
        $data['a_positive'] = $a_positive;
        $data['a_negative'] = $a_negative;
        $data['d_solution'] = $d_solution;
        $data['final_results'] = $final_results;
        return view('recomendation.all', $data);
    }
}
