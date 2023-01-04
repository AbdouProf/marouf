@extends('frontend.layouts.master')

@section('content')
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Login</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index-1.html">Accueil</a></li>
                        <li>Login</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-6 offset-xl-3">
            <div class="utf-login-register-page-aera margin-bottom-50">
                <div class="utf-welcome-text-item">
                    <h3>Login as Admin User</h3>
                </div>
                <form class="form-auth-small" method="POST" action="{{ route('admin.login') }}" id="login-form">
                    @csrf
                    <div class="utf-no-border">
                        <input type="text" class="utf-with-border" name="email" id="email"
                        placeholder="Email Address" required/="">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                       
                    </div>
                    <div class="utf-no-border">
                        <input type="password" class="utf-with-border" name="password" id="password"
                                     placeholder="Password" required/="">
                                 @error('password')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                    </div>
                    <div class="checkbox margin-top-10">
                        <input type="checkbox" id="two-step">
                        <label for="two-step"><span class="checkbox-icon"></span> Remember Me</label>
                    </div>
                    <a href="forgot-password.html" class="forgot-password">Forgot Password?</a>
                    <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10" type="submit"
                 >Log In <i class="icon-feather-chevron-right"></i></button>
                </form>
              
                <div class="utf-social-login-separator-item"><span>Maarouf</span></div>
                
            </div>
        </div>
    </div>
</div>

@endsection