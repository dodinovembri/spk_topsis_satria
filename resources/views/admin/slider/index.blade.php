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
                            <li class="breadcrumb-item active" aria-current="page">Gambar Slider</li>
                        </ol>
                    </nav>
                </div>
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">List Gambar Slider</div> <br>
                            @include('admin.components.flash_message')
                            <div class="card-body" style="margin-top: -20px;">
                                <a href="{{ url('admin/slider/create') }}"><button type="button" class="btn btn-primary">Buat Gambar Slider</button></a>
                            </div>
                            <div class="card-body">
                                <table id="basicExample" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Gambar Slider</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($sliders as $key => $value) {
                                            $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $value->judul }}</td>
                                                <td><img src="{{ asset('img/slider') }}/{{ $value->gambar }}" width="100px"  alt=""></td>
                                                <td>
                                                    <?php if ($value->status == 0) {
                                                        echo "Tidak Aktif";
                                                    }else{
                                                        echo "Aktif";
                                                    } ?>
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/slider/show', $value->id) }}"><span class="icon-eye"></span></a> &nbsp;
                                                    <a href="{{ url('admin/slider/edit', $value->id) }}"><span class="icon-border_color"></span></a> &nbsp;
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal{{ $value->id }}"><span class="icon-trash2"></span></a>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Anda yakin ingin menghapus data ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <a href="{{ url('admin/slider/destroy', $value->id) }}"><button type="button" class="btn btn-primary">Hapus Data</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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