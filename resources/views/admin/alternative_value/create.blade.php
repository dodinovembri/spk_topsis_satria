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
                            <li class="breadcrumb-item"><a href="{{ url('admin/alternative_values', Session::get('id_kriteria')) }}">Nilai Alternatif</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Buat Nilai Alternatif</li>
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
                                    <form action="{{ url('admin/alternative_value/store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">Buat Nilai Alternatif</div>
                                        <div class="card-body">
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Alternatif</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="{{ Session::get('kode_alternatif') }} - {{ Session::get('nama_alternatif') }}" readonly>
                                                </div>
                                            </div>
                                            <?php foreach ($criterias as $key => $value) {
                                                if ($value->kode_kriteria == "C3" || $value->kode_kriteria == "C4") {
                                                    continue;
                                                } ?>
                                                <div class="form-group row gutters">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">{{ $value->nama_kriteria }}</label>
                                                    <div class="col-sm-9">
                                                        <select name="weight[]" class="form-control" id="">
                                                            <option value="">Select</option>
                                                            <?php foreach ($value->criterion_value as $key2 => $value2) { ?>
                                                                <option value="{{ $value->id }}#{{ $value2->id }}">{{ $value2->keterangan }}</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Fasilitas</label>
                                            </div>
                                            <div class="form-group row gutters" style="margin-top: -40px;">
                                                <?php foreach ($facilities as $key2 => $value2) { ?>
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                       <input type="checkbox" name="facility[]" value="{{ $value2->id }}"> {{$value2->nama_fasilitas}}
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Aksesibilitas</label>
                                            </div>
                                            <div class="form-group row gutters" style="margin-top: -40px;">
                                                <?php foreach ($accessibilities as $key3 => $value3) { ?>
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                       <input type="checkbox" name="accessibility[]" value="{{ $value3->id }}"> {{$value3->nama_aksesibilitas}}
                                                    </div>
                                                <?php } ?>
                                            </div>                                            
                                            <br>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <a href="{{ url('admin/alternative_values', Session::get('id_alternatif')) }}"><button type="button" class="btn btn-danger">Batal</button></a>
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