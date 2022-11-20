@extends('layouts.app')

@section('content')


@include('components.loader')

<div class="site-content">

    @include('components.header')

    <div class="main-wrapper bg-white">
        <div class="container pd-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main-wrapper-content style-one">
                        <div>
                            <h3 style="text-align: center;">Contact Us</h3>
                        </div>
                        <main class="site-main ">
                            <article class="post style-four post-full post no-image page no-image">

                                <div class="entry-content">
                                    <div class="entry-summary">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="contact-form">
                                                    @if(session()->has('message'))
                                                    <center><button type="button" class="btn btn-primary btn-cus-siz mt-20">{{ session()->get('message') }}</button></center><br>
                                                    @endif
                                                    
                                                    <form class="row" action="{{ url('contact/store') }}" method="POST" id="contact-form">
                                                        @csrf
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <div class="input-wrapper">
                                                                    <label>Your Name</label>
                                                                    <input name="nama" type="text" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <div class="input-wrapper">
                                                                    <label>Email Address</label>
                                                                    <input type="email" name="email" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <div class="input-wrapper">
                                                                    <label>Subject</label>
                                                                    <input name="subject" type="text" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <div class="input-text-form">
                                                                    <label>Message</label>
                                                                    <textarea class="form-control" name="pesan" cols="10" rows="10" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="signin-btn mb-30 text-center">
                                                                <button type="submit" class="btn btn-primary btn-cus-siz mt-20">Send
                                                                    Message</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--~./ end main wrapper ~-->

    @include('components.footer')
</div>

<a href='#top' id='scroll-top' class='topbutton btn-hide'><span class='fas fa-angle-double-up'></span></a>

@endsection