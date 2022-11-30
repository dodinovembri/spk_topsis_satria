@extends('layouts.app')
<script src="{{ asset('assets/photo_sphere/three.min.js') }}"></script>
<script src="{{ asset('assets/photo_sphere/photo-sphere-viewer.min.js') }}"></script>
<style>
    html,
    body {
        margin: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    #container {
        width: 100%;
        height: 100%;
    }
</style>

@section('content')


<div id="loader-overlay">
    <div class="loader">
        <img src="{{ asset('logo/logo.jpg') }}" width="100px" alt="Studio Foto Prewedding" />
        <i class="fas fa-spinner fa-pulse"></i>
    </div>
</div>

<div class="site-content">

    @include('components.header')

    <div class="frontpage-slider-posts style-one">
        <?php if (isset($alternative->video)) { ?>


            <div style="margin: 20px;">
                <center>
                    <video controls>
                        <source src="{{ asset('img/alternative') }}/{{ $alternative->video }}" type="video/mp4">
                    </video>
                </center>
            </div>
        <?php } else { ?>
            <p>Video tidak tersedia</p>
        <?php } ?>
    </div>
</div>

@endsection