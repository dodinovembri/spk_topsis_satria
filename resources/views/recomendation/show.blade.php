@extends('layouts.app')

@section('content')


@include('components.loader')

<div class="site-content">

    @include('components.header')

    <div class="main-wrapper">
        <div class="blog-single-page">
            <article class="single-post single-post-two post tag-getting-started ">
                <div class="container">
                    <div class="entry-header">

                        <h3>{{ $alternative->nama_alternatif }}</h3>

                    </div>
                </div>

                <div class="container" style="margin-top: -50px;">
                    <div class="post-details">

                        <div class="entry-content">
                            <div class="all-contents">
                                <figure class="kg-card kg-image-card kg-card-hascaption"><img src="{{ asset('img/alternative') }}/{{ $alternative->gambar }}" class="kg-image" alt loading="lazy" width="1920" height="1104" sizes="(min-width: 720px) 720px">
                                    <a href="{{ url('destination', $alternative->id) }}" target="_blank">
                                        <figcaption>Lihat dengan mode Video</figcaption>
                                    </a>
                                </figure>
                                <p style="margin-top: -40px;"> <?php echo htmlspecialchars_decode($alternative->keterangan) ?></p>
                                <figure class="kg-card kg-gallery-card kg-width-wide kg-card-hascaption">
                                    <div class="kg-gallery-container">
                                        <div class="kg-gallery-row">
                                            <?php foreach ($alternative->gallery as $key => $value) { ?>
                                                <div class="kg-gallery-image">
                                                    <img src="{{ asset('img/gallery') }}/{{ $value->gambar }}" width="1920" height="1585" loading="lazy" sizes="(min-width: 720px) 720px">
                                                </div>
                                            <?php if ($key == 2) {
                                                break;
                                            } } ?>
                                        </div>
                                        <div class="kg-gallery-row">
                                            <?php foreach ($alternative->gallery as $key => $value) {
                                                if ($key > 2) { ?>
                                                    <div class="kg-gallery-image">
                                                        <img src="{{ asset('img/gallery') }}/{{ $value->gambar }}" width="1920" height="1302" loading="lazy" sizes="(min-width: 720px) 720px">
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <figcaption>Beautiful places</figcaption>
                                </figure>
                                <figure class="kg-card kg-image-card kg-card-hascaption">
                                    <article class="post tag-getting-started post-grid-style post-grid-style-two mrb-60">
                                        <?php clearstatcache();
                                        header("Cache-Control: no-cache, must-revalidate"); ?>
                                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnNIv78OvzBwmWEtVAQQrKq5UkFsNuZY8&callback=initialize" async defer></script>
                                        <script type="text/javascript">
                                            var marker;

                                            function initialize() {
                                                // Variabel untuk menyimpan informasi lokasi
                                                var infoWindow = new google.maps.InfoWindow;
                                                //  Variabel berisi properti tipe peta
                                                var mapOptions = {
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                }
                                                // Pembuatan peta
                                                var peta = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
                                                // Variabel untuk menyimpan batas kordinat
                                                var bounds = new google.maps.LatLngBounds();
                                                // Pengambilan data dari database MySQL
                                                <?php
                                                $lat  = (float)$alternative->latitude;
                                                $long = (float)$alternative->longitude;
                                                $info = $alternative->nama_alternatif;
                                                echo "addMarker($lat, $long, '$info');";
                                                ?>
                                                // Proses membuat marker 
                                                function addMarker(lat, lng, info) {
                                                    var lokasi = new google.maps.LatLng(lat, lng);
                                                    bounds.extend(lokasi);
                                                    var marker = new google.maps.Marker({
                                                        map: peta,
                                                        position: lokasi
                                                    });
                                                    peta.setOptions({

                                                        minZoom: 5,
                                                        maxZoom: 30
                                                    });
                                                    peta.fitBounds(bounds);
                                                    bindInfoWindow(marker, peta, infoWindow, info);
                                                }
                                                // Menampilkan informasi pada masing-masing marker yang diklik
                                                function bindInfoWindow(marker, peta, infoWindow, html) {
                                                    google.maps.event.addListener(marker, 'click', function() {
                                                        infoWindow.setContent(html);
                                                        infoWindow.open(peta, marker);
                                                    });
                                                }
                                            }
                                        </script>
                                        <div id="googleMap" style="width:100%; height:400px;"></div>
                                    </article>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="entry-footer"></div>
                </div>
            </article>
        </div>
    </div>
    <!--~./ end main wrapper ~-->

    @include('components.footer')
</div>
<a href='#top' id='scroll-top' class='topbutton btn-hide'><span class='fas fa-angle-double-up'></span></a>
@endsection