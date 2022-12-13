@extends('layouts.app')

@section('content')

@include('components.loader')

<div class="site-content">

    @include('components.header')

    <div class="main-wrapper pd-t-40">
        <div class="container pd-0">
            <div class="row justify-content-between">
                <div class="col-lg-12 main-wrapper-content">
                    <main class="site-main style-two">
                        <div class="row" id="post-masonry">
                            <div class="col-lg-8 post-loop odd">
                                <h2 style="text-align: center;"><b>SELAMAT DATANG</b></h2>
                                <h3 style="text-align: center;"><b>DI PORTAL PEMILIHAN STUDIO FOTO PREWEDDING</b></h3>
                                <h3 style="text-align: center;"><b>DI KOTA PALEMBANG</b></h3>
                                <br>
                                <article class="post tag-getting-started post-grid-style post-grid-style-two mrb-60">
                                    <div class="owl-carousel frontpage-slider-one style-three carousel-rectangle carousel-nav-center" style="height: 485px;">
                                        <?php foreach ($sliders as $key => $value) { ?>
                                            <article class="post hentry post-slider-four" style="background-image: url({{ asset('img/slider') }}/{{ $value->gambar }});">
                                                <!--./ entry-thumb -->
                                                <div class="container">
                                                    <div class="content-entry-wrap">
                                                        <div class="inner-box">

                                                            <h3 class="entry-title">
                                                                <a href="organising-content/index.html">{{ $value->judul }}</a>
                                                            </h3>
                                                            <br>
                                                            <!--./ entry-title -->
                                                        </div>
                                                    </div>
                                                    <!--./ content-entry-wrap -->
                                                </div>
                                            </article>
                                        <?php } ?>
                                    </div>
                                </article>
                                <a href="{{ url('recomendation/all') }}"><button style="color: transparent; background-color: transparent; border-color: transparent; cursor: default;">Rekomendasi</button></a></li>
                            </div>
                            <div class="col-lg-4 post-loop odd">
                                <article class="post tag-getting-started post-grid-style post-grid-style-two mrb-60">
                                    <div class="sign-wrapper-main mrt-20">
                                        <div class="signup-form mx-auto">
                                            <div class="cus-sign-box">
                                                <div class="form-inner-content">
                                                    <form data-members-form="signin" action="{{ url('recomendation/search') }}" method="POST">
                                                        @csrf
                                                        <h4>Temukan Rekomendasi Studio Foto Prewedding</h4><br>
                                                        <?php foreach ($criterias as $key => $value) {
                                                            if ($value->kode_kriteria == "C3") {
                                                                continue;
                                                            }  ?>
                                                            <select name="criterias[]" id="" class="form-control" style="margin-top: 10px;" required>
                                                                <option value="" disabled selected value>{{ $value->nama_kriteria }}</option>
                                                                <?php foreach ($value->criterion_value as $key2 => $value2) { ?>
                                                                    <option name="criterion_value" value="{{ $value->id }}#{{ $value2->nilai }}" class="fomr-control">{{ $value2->keterangan }}</option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php } ?>
                                                        <p>Fasilitas</p>
                                                        <?php foreach ($facilities as $key2 => $value2) { ?>
                                                            <input type="checkbox" name="facility[]" value="{{ $value2->id }}"> {{$value2->nama_fasilitas}} <br>
                                                        <?php } ?>
                                                        <br>
                                                        <div class="subscribe-btn d-flex align-items-center">
                                                            <button type="submit" class="btn btn-sign">
                                                                <span class="button-text">Dapatkan Rekomendasi</span>
                                                                <span class="button-loader"><i class="fas fa-sync-alt"></i></span>
                                                            </button>
                                                        </div>

                                                        <p class="mrt-45 text-center mrb-0 account-links"></p>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <style>
                                    /* The Modal (background) */
                                    .modal {
                                        display: none;
                                        /* Hidden by default */
                                        position: fixed;
                                        /* Stay in place */
                                        z-index: 1;
                                        /* Sit on top */
                                        padding-top: 100px;
                                        /* Location of the box */
                                        left: 0;
                                        top: 0;
                                        width: 100%;
                                        /* Full width */
                                        height: 100%;
                                        /* Full height */
                                        overflow: auto;
                                        /* Enable scroll if needed */
                                        background-color: rgb(0, 0, 0);
                                        /* Fallback color */
                                        background-color: rgba(0, 0, 0, 0.4);
                                        /* Black w/ opacity */
                                    }

                                    /* Modal Content */
                                    .modal-content {
                                        background-color: #fefefe;
                                        margin: auto;
                                        padding: 20px;
                                        border: 1px solid #888;
                                        width: 50%;
                                    }

                                    /* The Close Button */
                                    .close {
                                        color: #aaaaaa;
                                        float: right;
                                        font-size: 28px;
                                        font-weight: bold;
                                    }

                                    .close:hover,
                                    .close:focus {
                                        color: #000;
                                        text-decoration: none;
                                        cursor: pointer;
                                    }
                                </style>

                                <!-- The Modal -->
                                <div id="myModal" class="modal">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <center><span class="close">&times;</span></center>
                                        <?php foreach ($criterias as $key => $value) { ?>
                                            <ul><b>{{ $value->nama_kriteria }}</b> ({{ $value->keterangan }})
                                                <?php foreach ($value->criterion_value as $key2 => $value2) { ?>
                                                    <li style="margin-left: 20px;">{{ $value2->keterangan }}</li>
                                                <?php } ?>
                                            </ul><br>
                                        <?php } ?>
                                    </div>

                                </div>

                                <script>
                                    // Get the modal
                                    var modal = document.getElementById("myModal");

                                    // Get the button that opens the modal
                                    var btn = document.getElementById("myBtn");

                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close")[0];

                                    // When the user clicks the button, open the modal 
                                    btn.onclick = function() {
                                        modal.style.display = "block";
                                    }

                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() {
                                        modal.style.display = "none";
                                    }

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                        if (event.target == modal) {
                                            modal.style.display = "none";
                                        }
                                    }
                                </script>

                            </div>

                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <!--~./ end main wrapper ~-->

    @include('components.footer')
</div>

@endsection