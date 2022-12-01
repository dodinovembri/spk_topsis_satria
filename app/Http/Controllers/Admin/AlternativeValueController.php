<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlternativeModel;
use App\Models\AlternativeValueModel;
use App\Models\CriteriaModel;
use App\Models\CriterionValueModel;
use App\Models\FacilityModel;
use App\Models\AlternativeFacilityModel;
use App\Models\AlternativeAccessibilityModel;


class AlternativeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $alternative = AlternativeModel::find($id);
        session([
            'id_alternatif' => $id,
            'kode_alternatif' => $alternative->kode_alternatif,
            'nama_alternatif' => $alternative->nama_alternatif
        ]);

        $data['alternative_values'] = AlternativeValueModel::with('alternative')->with('criteria')->with('criterion_value')->where('id_alternatif', $id)->get();

        return view('admin.alternative_value.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['criterias'] = CriteriaModel::with('criterion_value')->get();
        $data['facilities'] = FacilityModel::all();

        return view('admin.alternative_value.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $findtodelete = AlternativeValueModel::where('id_alternatif', $request->session()->get('id_alternatif'))->get();
        foreach ($findtodelete as $key => $value) {
            $value->delete();
        }

        $weight = $request->weight;
        foreach ($weight as $key => $value) {
            $split = explode("#", $value);
            $insert = new AlternativeValueModel();
            $insert->id_alternatif = $request->session()->get('id_alternatif');
            $insert->id_kriteria = $split[0];
            $insert->id_nilai_kriteria = $split[1];
            $insert->save();
        }

        // save facility
        $facility = $request->facility;
        $c3 = CriteriaModel::where('kode_kriteria', "C3")->first();
        if (count($facility) == 0) {
            $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 1)->first();
        } elseif (count($facility) == 1 || count($facility) == 2) {
            $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 2)->first();
        } elseif (count($facility) == 3 || count($facility) == 4) {
            $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 3)->first();
        } elseif (count($facility) == 5 || count($facility) == 6) {
            $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 4)->first();
        } elseif (count($facility) >= 7) {
            $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 5)->first();
        }

        $insert2 = new AlternativeValueModel();
        $insert2->id_alternatif = $request->session()->get('id_alternatif');
        $insert2->id_kriteria = $c3->id;
        $insert2->id_nilai_kriteria = $criterion_value->id;
        $insert2->save();

        $findtodelete_facility = AlternativeFacilityModel::where('id_alternatif', $request->session()->get('id_alternatif'))->get();
        foreach ($findtodelete_facility as $key => $value) {
            $value->delete();
        }
        foreach ($facility as $key => $value) {
            $insert_facility = new AlternativeFacilityModel();
            $insert_facility->id_alternatif = $request->session()->get('id_alternatif');
            $insert_facility->id_fasilitas = $value;
            $insert_facility->save();
        }

        $weight_criterias = $request->weight_criterias;
        foreach ($weight_criterias as $key => $value) {
            $split = explode("#", $value);
            $insert = new AlternativeValueModel();
            $insert->id_alternatif = $request->session()->get('id_alternatif');
            $insert->id_kriteria = $split[0];
            $insert->id_nilai_kriteria = $split[1];
            $insert->save();
        }

        return redirect(url('admin/alternative_values', $request->session()->get('id_alternatif')))->with('message', 'Data Nilai Kriteria berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['alternative'] = AlternativeModel::find($id);
        return view('admin.alternative.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternative_value = AlternativeValueModel::with('alternative')->with('criteria')->with('criterion_value')->where('id', $id)->first();
        $data['alternative_value'] = $alternative_value;
        // $data['criterion_value'] = CriterionValueModel::where('id_kriteria', $alternative_value->id_kriteria)->get();
        $alternative_value = AlternativeValueModel::find($id);
        $criteria = CriteriaModel::where('id', $alternative_value->id_kriteria)->first();
        if ($criteria->kode_kriteria == "C3") {
            $alternative_facilities = AlternativeFacilityModel::with('facility')->where('id_alternatif', $alternative_value->id_alternatif)->get();
            $id_fasilitas = [];
            foreach ($alternative_facilities as $key => $value) {
                array_push($id_fasilitas, $value->id_fasilitas);
            }

            $data['accessibilities'] = [];
            $data['alternative_facilities'] = $alternative_facilities;
            $data['facilities'] = FacilityModel::whereNotIn('id', $id_fasilitas)->get();
        }
        $data['criterion_value'] = CriterionValueModel::where('id_kriteria', $alternative_value->id_kriteria)->get();

        return view('admin.alternative_value.edit', $data);
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
        if ($request->criteria == "C3") {            
            // save facility
            $facility = $request->facility;
            $c3 = CriteriaModel::where('kode_kriteria', "C3")->first();
            if (count($facility) == 0) {
                $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 1)->first();
            } elseif (count($facility) == 1 || count($facility) == 2) {
                $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 2)->first();
            } elseif (count($facility) == 3 || count($facility) == 4) {
                $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 3)->first();
            } elseif (count($facility) == 5 || count($facility) == 6) {
                $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 4)->first();
            } elseif (count($facility) >= 7) {
                $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 5)->first();
            }

            $update = AlternativeValueModel::find($id);
            $update->id_nilai_kriteria = $criterion_value->id;
            $update->update();

            $findtodelete_facility = AlternativeFacilityModel::where('id_alternatif', $request->session()->get('id_alternatif'))->get();
            foreach ($findtodelete_facility as $key => $value) {
                $value->delete();
            }
            foreach ($facility as $key => $value) {
                $insert_facility = new AlternativeFacilityModel();
                $insert_facility->id_alternatif = $request->session()->get('id_alternatif');
                $insert_facility->id_fasilitas = $value;
                $insert_facility->save();
            }
        }else{
            $update = AlternativeValueModel::find($id);
            $update->id_nilai_kriteria = $request->criterion_value;
            $update->update();
        }
        return redirect(url('admin/alternative_values', $request->session()->get('id_alternatif')))->with('message', 'Data berhasil diupdate!');
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
