<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlternativeValueModel;
use App\Models\CriteriaModel;
use App\Models\AlternativeModel;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        $data['final_results'] = $final_results;
        return view('admin.ranking.index', $data);
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
        // 
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
}
