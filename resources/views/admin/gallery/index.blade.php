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
                            <li class="breadcrumb-item active" aria-current="page">Gallery Alternatif</li>
                        </ol>
                    </nav>
                </div>
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">List Gallery</div> <br>
                            @include('admin.components.flash_message')
                            <div class="card-body" style="margin-top: -20px;">
                                <a href="{{ url('admin/alternative_gallery/create') }}"><button type="button" class="btn btn-primary">Tambah Gambar Gallery</button></a>
                            </div>
                            <div class="card-body">
                                <table id="basicExample" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Alternatif</th>
                                            <th>Gambar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($galleries as $key => $value) {
                                            $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ Session::get('nama_alternatif') }}</td>
                                                <td><img src="{{ asset('img/gallery') }}/{{ $value->gambar }}" width="100px" alt=""></td>
                                                <td>
                                                    <?php if ($value->status == 0) {
                                                        echo "Tidak Aktif";
                                                    } else {
                                                        echo "Aktif";
                                                    } ?>
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/alternative_gallery/show', $value->gambar) }}"><span class="icon-eye"></span></a> &nbsp;
                                                    <a href="{{ url('admin/alternative_gallery/edit', $value->gambar) }}"><span class="icon-border_color"></span></a> &nbsp;
                                                    <a href="{{ url('admin/alternative_gallery/destroy', $value->gambar) }}"><span class="icon-trash2"></span></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row ends -->

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