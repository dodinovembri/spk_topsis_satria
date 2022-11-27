@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="login-screen row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-container">
                    <div class="row no-gutters">
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                            <div class="login-box">
                                <a href="#" class="login-logo">
                                    <img src="{{ asset('logo/logo.jpg') }}" alt="Unify Admin Dashboard" />
                                </a>
                                <div class="input-group">
                                    <span class="input-group-addon" id="username"><i class="icon-account_circle"></i></span>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Username" aria-label="username" aria-describedby="username" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" aria-describedby="password" required>
                                </div>
                                <div class="actions clearfix">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>                        
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                            <div class="login-slider"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection