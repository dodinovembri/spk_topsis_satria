<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlternativeGalleryModel;
use App\Models\AlternativeModel;
use Illuminate\Support\Facades\DB;

class AlternativeGalleryController extends Controller
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

    public function index($id)
    {
        $alternative = AlternativeModel::find($id);
        session([
            'id_alternatif' => $id,
            'kode_alternatif' => $alternative->kode_alternatif,
            'nama_alternatif' => $alternative->nama_alternatif
        ]);

        
        $data['galleries'] = AlternativeGalleryModel::where('id_alternatif', $id)->get();

        return view('admin.gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file                       = $request->file('gambar');
        $fileName3                  = uniqid() . '.' . $file->getClientOriginalExtension();
        $request->file('gambar')->move("img/gallery/", $fileName3);

        $insert = new AlternativeGalleryModel();
        $insert->id_alternatif = $request->session()->get('id_alternatif');
        $insert->gambar = $fileName3;
        $insert->status = $request->status;
        $insert->save();

        return redirect(url('admin/alternative_galleries', $request->session()->get('id_alternatif')))->with('message', 'Sukses menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['gallery'] = DB::select("SELECT * FROM gallery WHERE `gambar` = '$id' ");
        return view('admin.gallery.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['gallery'] = DB::select("SELECT * FROM gallery WHERE `gambar` = '$id' ");
        return view('admin.gallery.edit', $data);
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
        $status = $request->status;
        $update = DB::select("UPDATE gallery SET `status` = $status WHERE `gambar` = '$id' ");
        
        return redirect(url('admin/alternative_galleries', $request->session()->get('id_alternatif')))->with('message', 'Sukses update data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $findtodelete = DB::select("DELETE FROM gallery WHERE `gambar` = '$id' ");
        return redirect(url('admin/alternative_galleries', $request->session()->get('id_alternatif')))->with('message', 'Data berhasil dihapus!');
    }
}
