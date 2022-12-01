@extends('layouts.admin')

@section('content')

<!-- BEGIN .app-wrap -->
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
            <!-- BEGIN .main-heading -->
            @include('admin.components.header')
            <!-- END: .main-heading -->
            <!-- BEGIN .main-content -->
            <div class="main-content">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stats-widget">
                                    <div class="stats-widget-header">
                                        <i class="icon-laptop_windows"></i>
                                    </div>
                                    <div class="stats-widget-body">
                                        <!-- Row start -->
                                        <ul class="row no-gutters">
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                                <h6 class="title">Alternatif</h6>
                                            </li>
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                                <h4 class="total">{{ $alternative }}</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stats-widget">
                                    <div class="stats-widget-header">
                                        <i class="icon-happy"></i>
                                    </div>
                                    <div class="stats-widget-body">
                                        <!-- Row start -->
                                        <ul class="row no-gutters">
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                                <h6 class="title">Feedback</h6>
                                            </li>
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                                <h4 class="total">{{ $contact_us }}</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stats-widget">
                                    <div class="stats-widget-header">
                                        <i class="icon-document3"></i>
                                    </div>
                                    <div class="stats-widget-body">
                                        <!-- Row start -->
                                        <ul class="row no-gutters">
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                                <h6 class="title">Kriteria</h6>
                                            </li>
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                                <h4 class="total">{{ $criteria }}</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stats-widget">
                                    <div class="stats-widget-header">
                                        <i class="icon-bookmarks"></i>
                                    </div>
                                    <div class="stats-widget-body">
                                        <!-- Row start -->
                                        <ul class="row no-gutters">
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                                <h6 class="title">Fasilitas</h6>
                                            </li>
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                                <h4 class="total">{{ $facility }}</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <footer class="main-footer fixed-btm">
        Copyright Studio Wong Kito 2022.
    </footer>
    <!-- END: .main-footer -->
</div>
<!-- END: .app-wrap -->

@endsection