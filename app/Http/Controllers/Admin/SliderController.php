<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel;

class SliderController extends Controller
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
        $data['sliders'] = SliderModel::all();
        return view('admin.slider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
        $request->file('gambar')->move("img/slider/", $fileName3);

        $insert = new SliderModel();
        $insert->judul = $request->judul;
        $insert->gambar = $fileName3;
        $insert->status = $request->status;
        $insert->save();

        return redirect(url('admin/slider'))->with('message', 'Sukses menambahkan data!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['slider'] = SliderModel::find($id);
        return view('admin.slider.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['slider'] = SliderModel::find($id);
        return view('admin.slider.edit', $data);
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
            $request->file('gambar')->move("img/slider/", $fileName3);
        }

        $update = SliderModel::find($id);
        $update->judul = $request->judul;
        if (isset($gambar)) {
            $update->gambar = $fileName3;
        }
        $update->status = $request->status;
        $update->update();
        return redirect(url('admin/slider'))->with('message', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findtodelete = SliderModel::find($id);
        $findtodelete->delete();

        return redirect(url('admin/slider'))->with('message', 'Data berhasil dihapus!');
    }
}
