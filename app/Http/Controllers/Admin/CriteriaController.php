<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CriteriaModel;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['criterias'] = CriteriaModel::all();
        return view('admin.criteria.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $check = CriteriaModel::where('kode_kriteria', $request->input('kode_kriteria'))->first();
        if (empty($check)) {
            $insert = new CriteriaModel();
            $insert->kode_kriteria = $request->kode_kriteria;        
            $insert->nama_kriteria = $request->nama_kriteria;        
            $insert->jenis_kriteria = $request->jenis_kriteria;        
            $insert->bobot = $request->bobot;        
            $insert->keterangan = $request->keterangan;
            $insert->save();

            return redirect(url('admin/criteria'))->with('message', 'Sukses menambahkan data!');
        }else{
            return redirect(url('admin/criteria'))->with('error', 'Data sudah tersedia!');            
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['criteria'] = CriteriaModel::find($id);
        return view('admin.criteria.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['criteria'] = CriteriaModel::find($id);
        return view('admin.criteria.edit', $data);
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
        $update = CriteriaModel::find($id);
        $update->nama_kriteria = $request->nama_kriteria;        
        $update->jenis_kriteria = $request->jenis_kriteria;        
        $update->bobot = $request->bobot;        
        $update->keterangan = $request->keterangan;
        $update->update();

        return redirect(url('admin/criteria'))->with('message', 'Data berhasil diupdate!');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findtodelete = CriteriaModel::find($id);
        $findtodelete->delete();

        return redirect(url('admin/criteria'))->with('message', 'Data berhasil dihapus!');
    }
}
