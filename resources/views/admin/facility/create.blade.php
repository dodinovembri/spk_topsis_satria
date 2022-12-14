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
                            <li class="breadcrumb-item"><a href="{{ url('admin/facility') }}"> Fasilitas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Buat Fasilitas</li>
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
                                    <form action="{{ url('admin/facility/store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">Buat Fasilitas</div>
                                        <div class="card-body">
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kode Fasilitas</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="kode_fasilitas" class="form-control" placeholder="Judul  Fasilitas" required>
                                                </div>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Fasilitas</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_fasilitas" class="form-control" placeholder="Nama  Fasilitas" required>
                                                </div>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select name="status" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="0">Tidak Aktif</option>
                                                        <option value="1">Aktif</option>
                                                    </select>
                                                </div>
                                            </div><br>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <a href="{{ url('admin/facility') }}"><button type="button" class="btn btn-danger">Batal</button></a>
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