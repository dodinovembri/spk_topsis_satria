@extends('layouts.app')

@section('content')

<div class="site-content">

    @include('components.header')

    <div class="frontpage-slider-posts style-one">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 no-padding">
                    <div class="owl-carousel frontpage-slider-one style-three carousel-rectangle carousel-nav-center">
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
                                            <div class="entry-category">
                                                <a href="{{ url('recomendation/filter') }}">Get Recomendation</a>
                                                <?php 
                                                $id = [];
                                                foreach ($alternatives as $key => $value) {
                                                    array_push($id, $value->id);
                                                } 
                                                $id_show = array_rand($id);
                                                $v = $id[$id_show]; ?>
                                                <a href="{{ url('recomendation/show', $v) }}" class="tag tag- lifestyle">See Prewedding Moment</a>
                                            </div>
                                            <!--./ entry-title -->
                                        </div>
                                    </div>
                                    <!--./ content-entry-wrap -->
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                    <!--/#frontpage-slide -->
                </div>
            </div>
        </div>
    </div>

    <div class="features-block">
        <div class="container pd-0 ml-t-90">
            <div class="row feature-list feature-list-one">
                <div class="col-lg-12 col-md-3">
                    <div class="col-lg-12 text-center mrt-30 mrb-90">
                        <div class="load-more-btn-area">
                            <a href="{{ url('recomendation') }}" class="load-more-btn">Lihat Daftar Studio Foto Prewedding</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var random_class = ['symbol-light-warning', 'symbol-light-primary', 'symbol-light-success', 'symbol-light-danger', 'symbol-light-dark', 'symbol-light-info'];
    </script>

    <div class="main-wrapper pd-t-60">
        <div class="container pd-0">
            <div class="row justify-content-between">
                <div class="col-lg-12 main-wrapper-content">
                    <main class="site-main style-two">
                        <div class="row">
                            <?php foreach ($alternatives as $key => $value) { ?>
                                <div class="col-lg-4 post-loop odd">
                                    <article class="post tag-getting-started post-grid-style post-grid-style-two mrb-60">
                                        <div class="entry-thumb">
                                            <figure class="thumb-wrap">
                                                <img class="post-card-image" src="{{ asset('img/alternative') }}/{{ $value->gambar }}" loading="lazy" alt="Start here for a quick overview everything you need to know" />
                                            </figure>
                                            <!--./ thumb-wrap -->
                                        </div>
                                        <!--./ entry-thumb -->
                                        <div class="content-entry-wrap">
                                            <div class="entry-category">
                                                <a href="{{ url('destination', $value->id) }}" target="_blank" class="tag tag- getting-started">Video Views</a>
                                            </div>
                                            <!--./ entry-category -->
                                            <h3 class="entry-title">
                                                {{ $value->nama_alternatif }}
                                            </h3>
                                            <!--./ entry-title -->
                                            <div class="entry-content">
                                                <p style="text-align: justify; "><?php echo htmlspecialchars_decode(substr($value->keterangan, 0, 80)) ?> ...</p>
                                            </div>
                                            <div class="entry-footer">
                                                <a href="{{ url('recomendation/show', $value->id) }}" class="more-links">Continue Reading -</a>
                                            </div>
                                        </div>
                                        <!--./ content-entry-wrap -->
                                    </article>
                                </div>
                            <?php if ($key == 5) {
                                    break;
                                }
                            } ?>
                        </div>
                    </main>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center mrt-30 mrb-90">
                    <div class="load-more-btn-area">
                        <a href="{{ url('recomendation') }}" class="load-more-btn">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--~./ end main wrapper ~-->
    @include('components.footer')
</div>
@endsection