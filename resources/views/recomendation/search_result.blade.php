@extends('layouts.app')

@section('content')


@include('components.loader')

<div class="site-content">

    @include('components.header')
    <br>
    <div>
        <h3 style="text-align: center;">Rekomendasi Tempat Wisata</h3>
    </div><br>
    <div class="main-wrapper pd-t-60">
        <div class="container pd-0">
            <div class="row justify-content-between">
                <div class="col-lg-12 main-wrapper-content">
                    <main class="site-main style-two">
                        <div class="row">
                            <?php $no = 0;
                            foreach ($final_results as $key => $value) {
                                $alternative = App\Models\AlternativeModel::where('id', $value['id_alternatif'])->first();
                                $no++; ?>
                                <div class="col-lg-3 post-loop odd">
                                    <article class="post tag-getting-started post-grid-style post-grid-style-two mrb-60">
                                        <div class="entry-thumb">
                                            <figure class="thumb-wrap">
                                                <a href="{{ url('recomendation/show', $alternative->id) }}">
                                                    <img src="{{ asset('img/alternative') }}/{{ $alternative->gambar }}" width="1px" alt="Start here for a quick overview everything you need to know" />
                                                </a>
                                            </figure>
                                            <!--./ thumb-wrap -->
                                        </div>
                                        <!--./ entry-thumb -->
                                        <div class="content-entry-wrap">
                                            <div class="entry-category">
                                                <a href="{{ url('recomendation/show', $alternative->id) }}" class="tag tag- getting-started">{{ $no }}</a>
                                            </div>
                                            <!--./ entry-category -->
                                            <h5 class="">
                                                <a href="{{ url('recomendation/show', $alternative->id) }}">
                                                    {{ $alternative->nama_alternatif }}
                                                </a>
                                            </h5>
                                            <!--./ entry-title -->
                                            <div class="entry-user">
                                                <div class="info">
                                                    <div class="author-name">
                                                        <span>{{ $value['preferensi'] }}</span>
                                                    </div>
                                                    <!--./ entry-time -->
                                                </div>
                                            </div>
                                            <div class="entry-content">
                                                <p style="text-align: justify; "><?php echo htmlspecialchars_decode(substr($alternative->keterangan, 0, 100)) ?>...</p>
                                            </div>
                                            <div class="entry-footer">
                                                <a href="{{ url('recomendation/show', $alternative->id) }}" class="more-links">Continue Reading -</a>
                                            </div>
                                        </div>
                                        <!--./ content-entry-wrap -->
                                    </article>

                                </div>
                            <?php } ?>
                        </div>
                    </main>

                </div>
                <div class="col-lg-3">
                    <button type="button" id="myBtn" class="form-control">Lihat Hasil Perhitungan</button>
                    <br>
                </div>
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
                        width: 100%;
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
                        <br>
                        <h3>Pembagi</h3>
                        <table border="1">
                            <?php foreach ($devider as $key => $value) { ?>
                                <td>{{ $value['nilai'] }}</td>
                            <?php } ?>
                        </table>
                        <br>
                        <h3>Matriks Yang Ternormalisasi</h3>
                        <table border="1">
                            <tr>
                                <td>Id Alternatif</td>
                                <td>Hasil Bagi (Kriteria 1 to N)</td>
                            </tr>
                            <?php foreach ($alternative_values as $key => $value) { ?>
                                <tr>
                                    <td>{{ $value['id_alternatif'] }}</td>
                                    <td>{{ $value['hasil_bagi'] }}</td>
                                </tr>
                            <?php } ?>
                        </table>
                        <br>
                        <h3>Bobot</h3>
                        <table border="1">
                            <tr>
                                <td>Kriteria</td>
                                <td>Bobot</td>
                            </tr>
                            <?php foreach ($weights as $key => $value) { ?>
                                <tr>
                                    <td>{{ $value['nama_kriteria'] }}</td>
                                    <td>{{ $value['bobot'] }}</td>
                                </tr>
                            <?php } ?>
                        </table>       
                        <br>                 
                        <h3>Bobot Ternormalisasi</h3>
                        <table border="1">
                            <tr>
                                <td>Id Alternatif</td>
                                <td>Hasil Kali (Kriteria 1 to N)</td>
                            </tr>
                            <?php foreach ($alternative_after_multiple as $key => $value) { ?>
                                <tr>
                                    <td>{{ $value['id_alternatif'] }}</td>
                                    <td>{{ $value['hasil_kali'] }}</td>
                                </tr>
                            <?php } ?>
                        </table>
                        <br>
                        <h3>A+</h3>
                        <table border="1">
                            <?php foreach ($a_positive as $key => $value) { ?>
                                <td>{{ $value }}</td>
                            <?php } ?>
                        </table>
                        <br>
                        <h3>A-</h3>
                        <table border="1">
                            <?php foreach ($a_negative as $key => $value) { ?>
                                <td>{{ $value }}</td>
                            <?php } ?>
                        </table>
                        <br>
                        <h3>D Solution</h3>
                        <table border="1">
                            <td>Id Alternatif</td>
                            <td>D Positive</td>
                            <td>D Negative</td>
                            <?php foreach ($d_solution as $key => $value) { ?>
                                <tr>
                                    <td>{{ $value['id_alternatif'] }} </td>
                                    <td>{{ $value['d_positif'] }} </td>
                                    <td>{{ $value['d_negatif'] }} </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <br>
                        <h3>Hasil Preferensi</h3>
                        <table border="1">
                            <td>Ranking</td>
                            <td>Id Alternatif</td>
                            <td>Preferensi</td>
                            <?php $no = 0;
                            foreach ($final_results as $key => $value) {
                                $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $value['id_alternatif'] }} </td>
                                    <td>{{ $value['preferensi'] }} </td>
                                </tr>
                            <?php } ?>
                        </table>
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
    </div>
    <!--~./ end main wrapper ~-->

    @include('components.footer')
</div>

<a href='#top' id='scroll-top' class='topbutton btn-hide'><span class='fas fa-angle-double-up'></span></a>

@endsection