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
                            <li class="breadcrumb-item"><a href="{{ url('admin/alternative_values', Session::get('id_alternatif')) }}">Nilai Alternatif</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Nilai Alternatif</li>
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
                                    <form action="{{ url('admin/alternative_value/update', $alternative_value->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">Buat Alternatif</div>
                                        <div class="card-body">
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Alternatif</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="{{ $alternative_value->alternative->kode_alternatif }} - {{ $alternative_value->alternative->nama_alternatif }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row gutters">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{ $alternative_value->criteria->nama_kriteria }}" required>
                                                </div>
                                            </div>
                                            <?php if (isset($facilities) || isset($accessibilities)) { ?>
                                                <?php if (count($facilities) > 0) {
                                                    if (count($facilities) > 0) { ?>
                                                        <input type="hidden" name="criteria" id="" value="C3">
                                                        <div class="form-group row gutters">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Fasilitas</label>
                                                        </div>
                                                        <div class="form-group row gutters" style="margin-top: -40px;">
                                                            <?php foreach ($alternative_facilities as $key2 => $value2) { ?>
                                                                <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                                                                <div class="col-sm-9">
                                                                    <input type="checkbox" name="facility[]" value="{{ $value2->id_fasilitas }}" checked> {{$value2->facility->nama_fasilitas}}
                                                                </div>
                                                            <?php } ?>
                                                            <?php foreach ($facilities as $key2 => $value2) { ?>
                                                                <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                                                                <div class="col-sm-9">
                                                                    <input type="checkbox" name="facility[]" value="{{ $value2->id }}"> {{$value2->nama_fasilitas}}
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div class="form-group row gutters">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nilai</label>
                                                        <div class="col-sm-9">
                                                            <select name="criterion_value" class="form-control" id="" required>
                                                                <option value="{{ $alternative_value->id_nilai_kriteria }}">{{ $alternative_value->criterion_value->keterangan }}</option>
                                                                <?php foreach ($criterion_value as $key => $value) { ?>
                                                                    <option value="{{ $value->id }}">{{ $value->keterangan }}</option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <div class="form-group row gutters">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nilai</label>
                                                    <div class="col-sm-9">
                                                        <select name="criterion_value" class="form-control" id="" required>
                                                            <option value="{{ $alternative_value->id_nilai_kriteria }}">{{ $alternative_value->criterion_value->keterangan }}</option>
                                                            <?php foreach ($criterion_value as $key => $value) { ?>
                                                                <option value="{{ $value->id }}">{{ $value->keterangan }}</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>
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