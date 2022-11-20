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
                            <li class="breadcrumb-item active" aria-current="page">Alternatif</li>
                        </ol>
                    </nav>
                </div>
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">List Ranking</div> <br>
                            @include('admin.components.flash_message')
                            <div class="card-body">
                                <table id="basicExample" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ranking</th>
                                            <th>Preferensi</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($final_results as $key => $value) {
                                            $alternative = App\Models\AlternativeModel::where('id', $value['id_alternatif'])->first();
                                            $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $value['preferensi'] }}</td>
                                                <td>{{ $alternative->kode_alternatif }}</td>
                                                <td>{{ $alternative->nama_alternatif }}</td>
                                                <td>{{ $alternative->latitude }}</td>
                                                <td>{{ $alternative->longitude }}</td>
                                                <td>
                                                    <a href="{{ url('admin/alternative/show', $alternative->id) }}"><span class="icon-eye"></span></a> &nbsp;
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