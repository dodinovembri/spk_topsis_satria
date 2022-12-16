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
                            <li class="breadcrumb-item active" aria-current="page">Detail Alternatif</li>
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
                                    <div class="card-header">Detail Alternatif</div>
                                    <div class="card-body">
                                        <div class="form-group row gutters">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Kode Alternatif</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="kode_alternatif" class="form-control" placeholder="Kode Alternatif" value="{{ $alternative->kode_alternatif }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row gutters">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Alternatif</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama_alternatif" class="form-control" placeholder="Nama Alternatif" value="{{ $alternative->nama_alternatif }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row gutters">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Maps Url</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="maps_url" class="form-control" placeholder="Maps Url" value="{{ $alternative->maps_url }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row gutters">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar</label>
                                            <div class="col-sm-9">
                                                <img src="{{ asset('img/alternative') }}/{{ $alternative->gambar }}" width="60%" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group row gutters">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Url Video</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="video" class="form-control" placeholder="Video" value="{{ $alternative->video }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row gutters">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea type="file" rows="9" name="keterangan" class="form-control">{{ $alternative->keterangan }}</textarea>
                                            </div>
                                        </div><br>
                                        <div class="form-group row gutters">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <a href="{{ url('admin/alternative') }}"><button type="button" class="btn btn-primary">Kembali</button></a>
                                            </div>
                                        </div>
                                    </div>
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