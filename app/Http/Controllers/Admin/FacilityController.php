<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacilityModel;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['facilities'] = FacilityModel::all();
        return view('admin.facility.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = new FacilityModel();
        $insert->kode_fasilitas = $request->kode_fasilitas;
        $insert->nama_fasilitas = $request->nama_fasilitas;
        $insert->status = $request->status;
        $insert->save();

        return redirect(url('admin/facility'))->with('message', 'Sukses menambahkan data!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['facility'] = FacilityModel::find($id);
        return view('admin.facility.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['facility'] = FacilityModel::find($id);
        return view('admin.facility.edit', $data);
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
        $update = FacilityModel::find($id);
        $update->kode_fasilitas = $request->kode_fasilitas;
        $update->nama_fasilitas = $request->nama_fasilitas;
        $update->status = $request->status;
        $update->update();
        return redirect(url('admin/facility'))->with('message', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findtodelete = FacilityModel::find($id);
        $findtodelete->delete();

        return redirect(url('admin/facility'))->with('message', 'Data berhasil dihapus!');
    }
}
