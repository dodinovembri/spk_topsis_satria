@extends('layouts.admin')

@section('content')

<div class="app-wrap">
    <!-- BEGIN .app-heading -->
    @include('admin.components.header')
    <!-- END: .app-heading -->
    <!-- BEGIN .app-container -->
    <div class="app-container">
        <!-- BEGIN .app-side -->
        @include('admin.components.sidebar')
        <!-- END: .app-side -->

        <!-- BEGIN .app-main -->
        <div class="app-main">
            <!-- BEGIN .main-content -->
            <div class="main-content">
                <div class="row gutters">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/alternative') }}">Alternatif</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Alternatif</li>
                        </ol>
                    </nav>
                </div>
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <form action="{{ url('admin/alternative/update', $alternative->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">Edit Alternatif</div>
                                        <div class="card-body">
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Alternatif</label>
                                                <div class="col-sm-9">
                                                    <select name="id_kategori" class="form-control" id="">
                                                        <option value="{{ $alternative->id_kategori }}">{{ $alternative->category->nama_kategori }}</option>
                                                        <?php foreach ($categories as $key => $value) { ?>
                                                            <option value="{{ $value->id }}">{{ $value->nama_kategori }}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kode Alternatif</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="kode_alternatif" class="form-control" placeholder="Kode Alternatif" value="{{ $alternative->kode_alternatif }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Alternatif</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_alternatif" class="form-control" placeholder="Nama Alternatif" value="{{ $alternative->nama_alternatif }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Latitude</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{ $alternative->latitude }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Logitude</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="{{ $alternative->longitude }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="gambar" class="form-control" placeholder="Longitude">
                                                </div>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar Panorama</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="gambar_panorama" class="form-control" placeholder="Longitude">
                                                </div>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                                                <div class="col-sm-9">
                                                    <textarea type="file" rows="7" id="editor" name="keterangan" class="form-control">{{ $alternative->keterangan }}</textarea>
                                                </div>
                                            </div><br>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <a href="{{ url('admin/alternative') }}"><button type="button" class="btn btn-danger">Batal</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>
                </div>
                <!-- Row end -->
            </div>
            <!-- END: .main-content -->
        </div>
        <!-- END: .app-main -->
    </div>
    <!-- END: .app-container -->
    <!-- BEGIN .main-footer -->
    @include('admin.components.footer')
    <!-- END: .main-footer -->
</div>
@endsection