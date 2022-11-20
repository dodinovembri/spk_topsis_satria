<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CriterionValueModel;
use App\Models\CriteriaModel;

class CriterionValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $criteria = CriteriaModel::find($id);
        session([
            'id_kriteria' => $id,
            'kode_kriteria' => $criteria->kode_kriteria,
            'nama_kriteria' => $criteria->nama_kriteria
        ]);

        $data['criterion_values'] = CriterionValueModel::with('criteria')->where('id_kriteria', $id)->get();
        return view('admin.criterion_value.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.criterion_value.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        $insert = new CriterionValueModel();
        $insert->id_kriteria = $request->session()->get('id_kriteria');
        $insert->keterangan = $request->keterangan;        
        $insert->nilai = $request->nilai;        
        $insert->save();

        return redirect(url('admin/criterion_values', $request->session()->get('id_kriteria')))->with('message', 'Sukses menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['criterion_value'] = CriterionValueModel::find($id);
        return view('admin.criterion_value.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['criterion_value'] = CriterionValueModel::find($id);
        return view('admin.criterion_value.edit', $data);
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
        $find = CriterionValueModel::find($id);        
        $find->keterangan = $request->keterangan;        
        $find->nilai = $request->nilai;     
        $find->update();

        return redirect(url('admin/criterion_values', $request->session()->get('id_kriteria')))->with('message', 'Data berhasil diupdate!');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $findtodelete = CriterionValueModel::find($id);
        $findtodelete->delete();

        return redirect(url('admin/criterion_values', $request->session()->get('id_kriteria')))->with('message', 'Data berhasil dihapus!');
    }
}
