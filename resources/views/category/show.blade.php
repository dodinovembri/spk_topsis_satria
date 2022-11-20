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
                            <?php foreach ($alternatives as $key => $value) { ?>
                                <div class="col-lg-3 post-loop odd">
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
                                                <a href="{{ url('destination', $value->id) }}" target="_blank" class="tag tag- getting-started">Panorama Views</a>
                                            </div>
                                            <!--./ entry-category -->
                                            <h3 class="entry-title">
                                                {{ $value->nama_alternatif }}
                                            </h3>
                                            <!--./ entry-title -->
                                            <div class="entry-content">
                                                <p style="text-align: justify; "><?php echo htmlspecialchars_decode(substr($value->keterangan, 0, 100)) ?>...</p>
                                            </div>
                                            <div class="entry-footer">
                                                <a href="{{ url('recomendation/show', $value->id) }}" class="more-links">Continue Reading -</a>
                                            </div>
                                        </div>
                                        <!--./ content-entry-wrap -->
                                    </article>
                                </div>
                            <?php } ?>
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