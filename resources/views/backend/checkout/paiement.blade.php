@extends('backend.layouts.master')

@section('content')

<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
    <div class="row">
        <div class="col-xl-12">
            <h3>Request a payement</h3>
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="index-1.html">Home</a></li>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <li>Request a payement</li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<form action="{{ route('paiement.store') }}" method="post">
    @csrf
   
    <div class="utf-dashboard-content-inner-aera">
        <div class="row">
            <div class="col-xl-12 col-md-12 margin-bottom-35">
                @if($errors->any())
                <div class="notification error closeable">
                    <ul>
                        @foreach ($errors->all() as $error)
                         <li>   {{$error}}</li>
                        @endforeach
                    </ul>
                    <a class="close" href="#"></a> </div>

                </div>
                @endif
            </div>

            <div class="col-xl-12">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3>General Information</h3>
                    </div>
                    <div class="content with-padding padding-bottom-10">
                        @php
                        $user = auth()->user() ;
                        @endphp
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Full name</h5>
                                    <input type="text" class="utf-with-border" name="p_name" value=" {{ $user->name }}"
                                        placeholder="Full name">
                                </div>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Email Address</h5>
                                    <input type="email" class="utf-with-border" name="p_email"
                                    value="{{ $user->email }}" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Phone Number</h5>
                                    <input type="text" class="utf-with-border" name="p_phone"
                                     value="{{ $user->phone }}" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>City</h5>
                                    <input type="text" class="utf-with-border" name="p_ville"
                                        value="{{ old('p_ville') }}" placeholder="Sfax">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Zip code</h5>
                                    <input type="text" class="utf-with-border" name="p_zip" value="{{ old('p_zip') }}"
                                        placeholder="0000">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>RIB</h5>
                                    <input type="text" class="utf-with-border" name="RIB"
                                        value="{{ old('RIB') }}" maxlength="20" placeholder="RIB">
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5>Amount <i class="help-icon" data-tippy-placement="top"
                                            title="Minimum 100 TND"></i></h5>
                                    <div class="keywords-container">
                                        <div class="keyword-input-container">
                                            <input type="number" class="keyword-input utf-with-border" name="p_mnt"
                                                value="{{ old('p_mnt') }}" placeholder="100 TND" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5>Comment</h5>
                                    <textarea cols="40" rows="2" class="utf-with-border" name="p_com"
                                        value="{{ old('p_com') }}" placeholder="Comment..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="utf-centered-button">
        <button type="submit" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Send my request
            <i class="icon-feather-plus"></i></button>
    </div>
</form>


@endsection

@section('scripts')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
@endsection