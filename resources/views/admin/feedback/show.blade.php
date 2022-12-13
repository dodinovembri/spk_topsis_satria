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
                            <li class="breadcrumb-item"><a href="{{ url('admin/feedback') }}">Feedback</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Feedback</li>
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
                                    <div class="card-header">Detail Feedback</div>
                                    <div class="card-body">
                                        <div class="form-group row gutters">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="kode_feedback" class="form-control" placeholder="Kode Feedback" value="{{ $feedback->kode_kriteria }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row gutters">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Pesan</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" rows="3" name="keterangan" class="form-control">{{ $feedback->pesan }}</textarea>
                                            </div>
                                        </div><br>
                                        <div class="form-group row gutters">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <a href="{{ url('admin/feedback') }}"><button type="button" class="btn btn-primary">Kembali</button></a>
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