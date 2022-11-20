<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlternativeModel;
use App\Models\TypeModel;
use Illuminate\Support\Facades\Validator;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['alternatives'] = AlternativeModel::all();
        return view('admin.alternative.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = TypeModel::all();
        return view('admin.alternative.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = AlternativeModel::where('kode_alternatif', $request->input('kode_alternatif'))->first();
        if (empty($check)) {

            $file                       = $request->file('gambar');
            $fileName3                  = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('gambar')->move("img/alternative/", $fileName3);

            $gambar_panorama = $request->file('gambar_panorama');
            if (isset($gambar_panorama)) {
                $file2                       = $request->file('gambar_panorama');
                $fileName4                  = uniqid() . '.' . $file2->getClientOriginalExtension();
                $request->file('gambar_panorama')->move("img/alternative/", $fileName4);
            }     

            $insert = new AlternativeModel();
            $insert->id_kategori = $request->id_kategori;
            $insert->kode_alternatif = $request->kode_alternatif;
            $insert->nama_alternatif = $request->nama_alternatif;
            $insert->latitude = $request->latitude;
            $insert->longitude = $request->longitude;
            $insert->gambar = $fileName3;
            if (isset($gambar_panorama)) {
                $update->gambar_panorama = $fileName4;
            }
            $insert->keterangan = $request->keterangan;
            $insert->save();

            return redirect(url('admin/alternative'))->with('message', 'Sukses menambahkan data!');
        } else {
            return redirect(url('admin/alternative'))->with('error', 'Data sudah tersedia!');
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
        $data['alternative'] = AlternativeModel::with('category')->where('id', $id)->first();
        $data['categories'] = TypeModel::all();
        return view('admin.alternative.edit', $data);
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
        $gambar = $request->file('gambar');
        if (isset($gambar)) {
            $file                       = $request->file('gambar');
            $fileName3                  = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('gambar')->move("img/alternative/", $fileName3);
        }
        $gambar_panorama = $request->file('gambar_panorama');
        if (isset($gambar_panorama)) {
            $file2                       = $request->file('gambar_panorama');
            $fileName4                  = uniqid() . '.' . $file2->getClientOriginalExtension();
            $request->file('gambar_panorama')->move("img/alternative/", $fileName4);
        }        

        $update = AlternativeModel::find($id);
        $update->id_kategori = $request->id_kategori;
        $update->kode_alternatif = $request->kode_alternatif;
        $update->nama_alternatif = $request->nama_alternatif;
        $update->latitude = $request->latitude;
        $update->longitude = $request->longitude;
        if (isset($gambar)) {
            $update->gambar = $fileName3;
        }
        if (isset($gambar_panorama)) {
            $update->gambar_panorama = $fileName4;
        }
        $update->keterangan = $request->keterangan;
        $update->update();
        return redirect(url('admin/alternative'))->with('message', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findtodelete = AlternativeModel::find($id);
        $findtodelete->delete();

        return redirect(url('admin/alternative'))->with('message', 'Data berhasil dihapus!');
    }
}
