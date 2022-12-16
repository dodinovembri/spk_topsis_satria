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
                                                }
                                            } ?>
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
                                        <iframe src="{{ $alternative->maps_url }}" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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