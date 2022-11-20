<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlternativeModel;
use App\Models\AlternativeValueModel;
use App\Models\CriteriaModel;
use App\Models\CriterionValueModel;
use App\Models\FacilityModel;
use App\Models\AccessibilityModel;
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
        $data['accessibilities'] = AccessibilityModel::all();

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
        if (count($facility) == 1) {
            $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 1)->first();
        } elseif (count($facility) == 2) {
            $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 2)->first();
        } elseif (count($facility) == 3) {
            $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 3)->first();
        } elseif (count($facility) == 4) {
            $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 4)->first();
        } elseif (count($facility) >= 5) {
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

        // save accessibility
        $accessibility = $request->accessibility;
        $c4 = CriteriaModel::where('kode_kriteria', "C4")->first();
        if (count($accessibility) == 1) {
            $criterion_value2 = CriterionValueModel::where('id_kriteria', $c4->id)->where('nilai', 1)->first();
        } elseif (count($accessibility) == 2) {
            $criterion_value2 = CriterionValueModel::where('id_kriteria', $c4->id)->where('nilai', 2)->first();
        } elseif (count($accessibility) == 3) {
            $criterion_value2 = CriterionValueModel::where('id_kriteria', $c4->id)->where('nilai', 3)->first();
        } elseif (count($accessibility) == 4) {
            $criterion_value2 = CriterionValueModel::where('id_kriteria', $c4->id)->where('nilai', 4)->first();
        } elseif (count($accessibility) >= 5) {
            $criterion_value2 = CriterionValueModel::where('id_kriteria', $c4->id)->where('nilai', 5)->first();
        }

        $insert3 = new AlternativeValueModel();
        $insert3->id_alternatif = $request->session()->get('id_alternatif');
        $insert3->id_kriteria = $c4->id;
        $insert3->id_nilai_kriteria = $criterion_value2->id;
        $insert3->save();

        $findtodelete_accesibility = AlternativeAccessibilityModel::where('id_alternatif', $request->session()->get('id_alternatif'))->get();
        foreach ($findtodelete_accesibility as $key => $value) {
            $value->delete();
        }
        foreach ($accessibility as $key => $value) {
            $insert_accesibility = new AlternativeAccessibilityModel();
            $insert_accesibility->id_alternatif = $request->session()->get('id_alternatif');
            $insert_accesibility->id_aksesibilitas = $value;
            $insert_accesibility->save();
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
        } elseif ($criteria->kode_kriteria == "C4") {
            $alternative_accessibilities = AlternativeAccessibilityModel::with('accessibility')->where('id_alternatif', $alternative_value->id_alternatif)->get();
            $id_aksesibilitas = [];
            foreach ($alternative_accessibilities as $key => $value) {
                array_push($id_aksesibilitas, $value->id_aksesibilitas);
            }

            $data['facilities'] = [];
            $data['alternative_accessibilities'] = $alternative_accessibilities;
            $data['accessibilities'] = AccessibilityModel::whereNotIn('id', $id_aksesibilitas)->get();
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
            if (count($facility) == 1) {
                $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 1)->first();
            } elseif (count($facility) == 2) {
                $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 2)->first();
            } elseif (count($facility) == 3) {
                $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 3)->first();
            } elseif (count($facility) == 4) {
                $criterion_value = CriterionValueModel::where('id_kriteria', $c3->id)->where('nilai', 4)->first();
            } elseif (count($facility) >= 5) {
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
        } elseif ($request->criteria == "C4") {
            // save accessibility
            $accessibility = $request->accessibility;
            $c4 = CriteriaModel::where('kode_kriteria', "C4")->first();
            if (count($accessibility) == 1) {
                $criterion_value2 = CriterionValueModel::where('id_kriteria', $c4->id)->where('nilai', 1)->first();
            } elseif (count($accessibility) == 2) {
                $criterion_value2 = CriterionValueModel::where('id_kriteria', $c4->id)->where('nilai', 2)->first();
            } elseif (count($accessibility) == 3) {
                $criterion_value2 = CriterionValueModel::where('id_kriteria', $c4->id)->where('nilai', 3)->first();
            } elseif (count($accessibility) == 4) {
                $criterion_value2 = CriterionValueModel::where('id_kriteria', $c4->id)->where('nilai', 4)->first();
            } elseif (count($accessibility) >= 5) {
                $criterion_value2 = CriterionValueModel::where('id_kriteria', $c4->id)->where('nilai', 5)->first();
            }

            $update = AlternativeValueModel::find($id);
            $update->id_nilai_kriteria = $criterion_value2->id;
            $update->update();

            $findtodelete_accesibility = AlternativeAccessibilityModel::where('id_alternatif', $request->session()->get('id_alternatif'))->get();
            foreach ($findtodelete_accesibility as $key => $value) {
                $value->delete();
            }
            foreach ($accessibility as $key => $value) {
                $insert_accesibility = new AlternativeAccessibilityModel();
                $insert_accesibility->id_alternatif = $request->session()->get('id_alternatif');
                $insert_accesibility->id_aksesibilitas = $value;
                $insert_accesibility->save();
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
