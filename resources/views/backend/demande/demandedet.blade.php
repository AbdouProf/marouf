@extends('frontend.layouts.master')

@section('content')
<!-- Preloader Start -->

<div class="clearfix"></div>


<!-- Titlebar -->
<div class="single-page-header" data-background-image="../img/subscribe_bg.jpeg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="utf-single-page-header-inner-aera">
                    <div class="utf-left-side">
                        @php
                        $image = explode(',', $user->image);
                        @endphp
                        <div class="utf-header-image"><img src="/{{ $image[0] }}" alt=""></div>
                        <div class="utf-header-details">
                            <ul>
                                <li> {{ $user->name }} , @if($demande->country_id == 1 ) <b> Tunisie </b> <img
                                        class="flag" src="/img/flags/tn.svg" alt="" title="Tunisie"
                                        data-tippy-placement="top"> @else
                                    <b> France </b> <img class="flag" src="/img/flags/fr.svg" alt="" title="France"
                                        data-tippy-placement="top"> @endif
                                </li>
                            </ul>
                            <h3>{{ ucfirst($demande->title) }} <span class="utf-verified-badge" title="Verified"
                                    data-tippy-placement="top"></span></h3>
                            <div class="utf-header-details">
                                <h5><i class="icon-material-outline-location-on"></i> {{$demande->Dadress}} -{{
                                    \App\Models\State::where('id', $demande->state_id)->value('name') }}</h5>

                                @if ($demande->cat_id == 1)
                                <span class="dashboard-status-button green" style="top: 3px"><i class="icofont-shopping-cart"></i>
                                    {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                @elseif($demande->cat_id == 4)
                                <span class="dashboard-status-button yellow" style="top: 3px"><i class="icofont-auto-mobile"></i>
                                    {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                @else
                                <span class="dashboard-status-button red" style="top: 3px" ><i class="icofont-fast-delivery"></i>
                                    {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-8 utf-content-right-offset-aera">
            <!-- Description -->
            <div class="utf-single-page-section-aera">
                <div class="utf-boxed-list-headline-item">
                    <h3><i class="icon-feather-info"></i> About the mission</h3>
                </div>
                <div id="single_demande_thumb">

                    <div id="demandes_details_slider" class="carousel slide" data-ride="carousel" data-interval="5000">
                        @php
                        $photos = explode(',', $demande->Dimage);
                        @endphp
                        <!-- Carousel Inner -->

                        <div class="utf-blog-carousel-block-related" id='photot'>

                            @foreach ($photos as $key => $Dimage)
                            <div class="utf-blog-item-container-part">
                                <div class="utf-blog-compact-item {{ $key == 0 ? 'active' : '' }} ">
                                    <a class="gallery_img" href="{{ $Dimage }}" title="{{ $demande->title }}">
                                        <img class="mx-auto  " src="{{ $Dimage }}" alt="{{ $demande->title }}">
                                    </a>

                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--     -->



                    </div>

                </div>
            </div>

            @php
            $lat = ($demande->lat);
            $lng = ($demande->lng);
            @endphp

            <p>{{ $demande->Ddesc }}</p>
            <div class="utf-single-page-section-aera">
                <div class="utf-boxed-list-headline-item">
                    <h3><i class="icon-material-outline-location-on"></i> Mission Location</h3>
                </div>
                <div id="utf-single-job-map-container-item">
                    <div id="singleListingMap" data-latitude="<?php echo e($lat); ?>"
                        data-longitude="<?php echo e($lng); ?>" data-map-icon="im im-icon-Hamburger"></div>
                </div>
            </div>
            <!-- Atachments -->

            <div class="utf-detail-social-sharing margin-top-10">
                <div class="utf-boxed-list-headline-item">
                    <h3><i class="icon-feather-share-2"></i>  Share this mission on social networks                    </h3>
                </div>
                <ul class="margin-top-15">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}" title="Facebook"
                            data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ URL::current() }}"
                            title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a>
                    </li>
                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ URL::current() }}"
                            title="LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-xl-4 col-lg-4">
            <div class="utf-sidebar-container-aera">
                <div class="bidding-countdown margin-bottom-30" title="You still have." data-tippy-placement="top">
                    @php
                    $to_date = \Carbon\Carbon::now();
                    $from_date = \Carbon\Carbon::create( $demande->Std_close);
                    $answer_in_days = $to_date->diffInDays( $from_date, false);

                    @endphp
                    <input type="hidden" id="myDate" value="{{$demande->Std_close}}">

                    @if ( $answer_in_days > 0 )
                     <h3 style="color: azure"> You still have  <h3>
                    <h3 id="demo" style="color: azure"> </h3>
                </div>
                @else
                Offer Closed
            </div>
            @endif



            <div class="utf-sidebar-widget-item">
                <h3>Estimated budget of the mission</h3>
                <div class="utf-right-side">
                    <div class="salary-box">
                        <div class="salary-amount"> {{ $demande->Bmin }} TND - {{ $demande->Bmax }} TND
                        </div>
                    </div>
                </div>
            </div>

            @auth
            @php
            $offre=\App\Models\offre::where(['demande_id'=>$demande->id,'user_id'=>auth()->user()->id])->first();
            @endphp
            @if ( $demande->user_id != auth()->user()->id && $offre == NULL )
            <form action="{{ route('offre.store') }}" method="post">
                @csrf

                <div class="utf-sidebar-widget-item">
                    <div class="bidding-widget">
                        <div class="utf-bidding-overview-headline">Send an offer</div>
                        <div class="bidding-inner">
                            <span class="bidding-detail">Please define your price offer for this mission</strong></span>
                            <div class="bidding-value">TND<span id="biddingVal"></span></div>
                            <input class="bidding-slider" type="text" value="" data-slider-handle="custom"
                                data-slider-currency="TND" data-slider-min="0" data-slider-max="1000"
                                data-slider-value="1" data-slider-step="1" data-slider-tooltip="hide" name="Mnt_offre"
                                value="{{ old('Mnt_offre') }}">
                            <span class="bidding-detail margin-top-30"><strong>You will close the mission in:</strong></span>
                            <div class="bidding-fields">
                                <div class="bidding-field">
                                    <div class="qtyButtons">
                                        <div class="qtyDec"></div>
                                        <input type="text" value="1" name="Nbrj_offre" value="{{ old('Nbrj_offre') }}">
                                        <div class="qtyInc"></div>
                                    </div>
                                </div>
                                <div class="bidding-field">
                                    <select class="default show-tick" name='Date_offre'>
                                        <option value="Mois" {{ old('Date')=='Mois' ? 'selected' : '' }}>Month
                                        </option>
                                        <option value="Jours" {{ old('Date')=='Jours' ? 'selected' : '' }}>
                                            Days</option>
                                        <option value="Heurs" {{ old('Date')=='Heurs' ? 'selected' : '' }}>
                                            Hours</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="demande_id" value="{{ $demande->id }}">
                            @auth
                            <button id="snackbar-place-bid" type="submit"
                                class="button ripple-effect move-on-hover full-width margin-top-25"><span>Send</span></button>
                            @else
                            <p class="py-5">Login to send offer <a href="#utf-signin-dialog-block"
                                    class="popup-with-zoom-anim log-in-button"> Click here !!</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
            @elseif ($demande->user_id != auth()->user()->id && $offre != NULL )

            <div class="utf-sidebar-widget-item">
                <div class="bidding-widget">
                    <div class="utf-bidding-overview-headline">Your proposition</div>
                    <div class="bidding-inner">
                        <span class="bidding-detail">Your offer for this mission is <br>
                             
                            <strong> {{$offre->Mnt_offre}}  TND  </strong> <br> 
                            within <strong>   {{$offre->Nbrj_offre }} {{$offre->Date_offre }}   </strong> <br> 

                        </span>

                    </div>
                </div>
            </div>
            @else

            @endif
            @else
            <form action="{{ route('offre.store') }}" method="post">
                @csrf

                <div class="utf-sidebar-widget-item">
                    <div class="bidding-widget">
                        <div class="utf-bidding-overview-headline">Send an offer</div>
                        <div class="bidding-inner">
                            <span class="bidding-detail">Merci de définir votre offre de prix pour cette
                                mission</strong></span>
                            <div class="bidding-value">TND<span id="biddingVal"></span></div>
                            <input class="bidding-slider" type="text" value="" data-slider-handle="custom"
                                data-slider-currency="TND" data-slider-min="0" data-slider-max="1000"
                                data-slider-value="1" data-slider-step="1" data-slider-tooltip="hide" name="Mnt_offre"
                                value="{{ old('Mnt_offre') }}">
                            <span class="bidding-detail margin-top-30"><strong>Vous clôturerez le projet
                                    dans:</strong></span>
                            <div class="bidding-fields">
                                <div class="bidding-field">
                                    <div class="qtyButtons">
                                        <div class="qtyDec"></div>
                                        <input type="text" value="1" name="Nbrj_offre" value="{{ old('Nbrj_offre') }}">
                                        <div class="qtyInc"></div>
                                    </div>
                                </div>
                                <div class="bidding-field">
                                    <select class="default show-tick" name='Date_offre'>
                                        <option value="Mois" {{ old('Date')=='Mois' ? 'selected' : '' }}>Mois
                                        </option>
                                        <option value="Jours" {{ old('Date')=='Jours' ? 'selected' : '' }}>
                                            Jours</option>
                                        <option value="Heurs" {{ old('Date')=='Heurs' ? 'selected' : '' }}>
                                            Heurs</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="demande_id" value="{{ $demande->id }}">
                            @auth
                            <button id="snackbar-place-bid" type="submit"
                                class="button ripple-effect move-on-hover full-width margin-top-25"><span>Envoyer</span></button>
                            @else
                            <p class="py-5">Login to send offre <a href="#utf-signin-dialog-block"
                                    class="popup-with-zoom-anim log-in-button"> Click here !!</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
            @endif


            <div class="utf-sidebar-widget-item">
                <div class="utf-detail-banner-add-section">
                    <a href="#"><img src="/img/banner-add-2.jpeg" alt="banner-add-2"></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div id="utf-signin-dialog-block" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <div class="utf-signin-form-part">
        <ul class="utf-popup-tabs-nav-item">
            <li><a href="#login">Log In</a></li>
            <li><a href="#register">Register</a></li>
        </ul>
        <div class="utf-popup-container-part-tabs">
            <!-- Login -->
            <div class="utf-popup-tab-content-item" id="login">
                <div class="utf-welcome-text-item">
                    <h3>Welcome Back Sign in to Continue</h3>
                    <span>Don't Have an Account? <a href="#" class="register-tab">Sign Up!</a></span>
                </div>
                <form method="post" id="login-form" action="{{ route('login.submit') }}">
                    @csrf
                    <div class="utf-no-border">
                        <input type="text" class="utf-with-border" name="email" id="email" placeholder="Email Address"
                            required/="">
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
                    <div class="checkbox margin-top-0">
                        <input type="checkbox" id="two-step" />
                        <label for="two-step"><span class="checkbox-icon"></span> Remember Me</label>
                    </div>
                    <a href="forgot-password.html" class="forgot-password">Forgot Password?</a>
                </form>
                <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit"
                    form="login-form">Log In <i class="icon-feather-chevron-right"></i></button>
                <div class="utf-social-login-separator-item">
                    <span>Or Login in With</span>
                </div>
                <div class="utf-social-login-buttons-block">
                    <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i>
                        Facebook</button>
                    <button class="google-login ripple-effect"><i class="icon-brand-google"></i>
                        Google</button>
                    <button class="twitter-login ripple-effect"><i class="icon-brand-twitter"></i>
                        Twitter</button>
                </div>
            </div>
            <!-- Register -->
            <div class="utf-popup-tab-content-item" id="register">
                <div class="utf-welcome-text-item">
                    <h3>Create your Account!</h3>
                    <span>Don't Have an Account? <a href="#" class="register-tab">Sign Up!</a></span>
                </div>
                <form method="post" id="utf-register-account-form" action="{{ route('register.submit') }}">
                    @csrf

                    <div class="utf-no-border">
                        <input type="text" class="utf-with-border" name="name" id="name" placeholder="User Name"
                            required/="" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="utf-no-border">
                        <input type="text" class="utf-with-border" name="email" id="email" placeholder="Email Address"
                            required/="" value="{{ old('email') }}">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="utf-no-border">
                        <input type="text" class="utf-with-border" name="phone" id="phone"
                            placeholder="phone number (+216) " required/="" value="{{ old('phone') }}">
                        @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="utf-no-border" title="Should be at least 8 characters long"
                        data-tippy-placement="bottom">
                        <input type="password" class="utf-with-border" name="password" id="password"
                            placeholder="Password" required/="">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="utf-no-border">
                        <input type="password" class="utf-with-border" name="password_confirmation" id="password"
                            placeholder="Repeat Password" required/="">
                    </div>
                    <div class="checkbox margin-top-0">
                        <input type="checkbox" id="two-step0" />
                        <label for="two-step0"><span class="checkbox-icon"></span> I Have Read and Agree to
                            the <a href="#">Terms &amp; Conditions</a></label>
                    </div>
                </form>
                <button class="margin-top-10 button full-width utf-button-sliding-icon ripple-effect" type="submit"
                    form="utf-register-account-form">Register <i class="icon-feather-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Google API & Maps -->
<!-- Geting an API Key: https://developers.google.com/maps/documentation/javascript/get-api-key -->

<script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>
<script src="/js/infobox.min.js"></script>
<script src="/js/markerclusterer.js"></script>
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<script src="{{ asset('../frontend/assets/js/bootstrap.min.js') }}"></script>

<script src="/js/maps.js"></script>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/jquery-migrate-3.0.0.min.js"></script>
<script src="/js/custom_jquery.js"></script>
<script>
    console.log( $from_date);
</script>

<script>
    // Set the date we're counting down to
    var x = document.getElementById("myDate").value; 
    var countDownDate = new Date(x).getTime();
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date().getTime();
        
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
        
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = days + " days " + hours + " h "
      + minutes + " m " + seconds + " s ";
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
</script>
@endsection