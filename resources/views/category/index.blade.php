@extends('layouts.app')

@section('content')


@include('components.loader')

<div class="site-content">

    @include('components.header')
    <br>
    <div>
        <h3 style="text-align: center;">Kategori Tempat Wisata</h3>
    </div>
    <div class="main-wrapper bg-white">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12 main-wrapper-content">

                    <main class="site-main mrt-25">
                        <div class="tags-sec section-padding">
                            <div class="row">
                                <?php foreach ($categories as $key => $value) { ?>
                                    <div class="col-sm-6 col-lg-4">
                                        <a href="{{ url('category/show', $value->id) }}">
                                            <div class="popular-tags">
                                                <div class="cus-tags-feature">
                                                    <img class="lazy" src="{{ asset('img/type') }}/{{ $value->gambar }}" alt="" />
                                                </div>
                                                <footer class="tags-card-footer">
                                                    <div class="tags-posts-meta">
                                                        <h4 class="tags-name">{{ $value->nama_kategori }}</h4>
                                                    </div>
                                                </footer>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
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