<div id="wrapper">
    <!-- Header Container -->
    <header id="utf-header-container-block">
        <div id="header">
            <div class="container">
                <div class="utf-left-side">
                    <div id="logo">
                        <a href="{{route('home')}}"><img src="/img/logo.png" alt="" /></a>
                    </div>
                    <nav id="navigation">
                        <ul id="responsive">
                            <li>
                                <a href="#" class="current">Home</a>
                            </li>
                            <li>
                                <a href="#">Requests for services</a>
                                <ul class="dropdown-nav">
                                    <li>
                                        <a href="{{route('search.akthili')}}">A9thili</a>
                                        <a href="{{route('search.livrili')}}">Livrili</a>
                                        <a href="{{route('search.wasalni')}}">Wasalni</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="browse-companies.html">The concept</a>
                            </li>
                            <li>
                                <a href="{{route('contact.us')}}">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                </div>

                <div class="utf-right-side">
                    @auth
                    @php
                    $first_name=explode(' ',auth()->user()->name)
                    @endphp
                    <div class="utf-header-widget-item">
                        <div class="utf-header-notifications user-menu">
                            <div class="utf-header-notifications-trigger user-profile-title">
                                <a href="#">

                                    @php
                                    $image=explode(',',Auth::user()->image);
                                    @endphp
                                    @if (Auth::user()->image == NULL)
                                    <div class="user-avatar status-online">
                                        <img src="{{asset('backend/assets/images/default.jpg')}}"
                                            alt="User Profile Picture">
                                    </div>
                                    @else
                                    <div class="user-avatar status-online">
                                        <img src="/{{Auth::user()->image}}" name="image" />
                                    </div>
                                    @endif

                                    <div class="user-name"> Welcome, {{ ucfirst($first_name[0])}}</div>
                                </a>
                            </div>

                            <div class="utf-header-notifications-dropdown-block">
                                <ul class="utf-user-menu-dropdown-nav">
                                    <li>
                                        <a href="{{route('user-dash')}}"><i class="icon-material-outline-dashboard"></i>
                                            Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{route('demande.show')}}"><i
                                                class="icon-material-outline-file-copy"></i> My requests</a>
                                    </li>
                                    <li>
                                        <a href="{{route('offre.show')}}"><i class="icon-line-awesome-money"></i> My offers </a>
                                    </li>
                                    <li>
                                        <a href="{{route('wishlist')}}"><i class="icon-feather-heart"></i> Wishlist </a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.account')}}"><i class="icon-feather-user"></i> My account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.logout') }}"><i
                                                class="icon-material-outline-power-settings-new"></i> Log out</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="utf-header-widget-item">
                        <a href="#utf-signin-dialog-block" class="popup-with-zoom-anim log-in-button"><i
                                class="icon-feather-log-in"></i> <span>Sign In</span></a>
                    </div>
                    @endauth

                    <span class="mmenu-trigger">
                        <button class="hamburger utf-hamburger-collapse-item" type="button">
                            <span class="utf-hamburger-box-item">
                                <span class="utf-hamburger-inner-item"></span>
                            </span>
                        </button>
                    </span>
                </div>
            </div>
        </div>

        @auth
        <div> </div>
        @else
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
                            <div class="checkbox margin-top-0">
                                <input type="checkbox" id="two-step" />
                                <label for="two-step"><span class="checkbox-icon"></span> Remember Me</label>
                            </div>
                            <a href="{{ route('forget.password.get') }}" class="forgot-password">Forgot Password?</a>
                        </form>
                        <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit"
                            form="login-form">Log In <i class="icon-feather-chevron-right"></i></button>
                        <div class="utf-social-login-separator-item">
                            <span>Maarouf</span>
                        </div>
                       
                    </div>
                    <!-- Register -->
                    <div class="utf-popup-tab-content-item" id="register">
                        <div class="utf-welcome-text-item">
                            <h3>Create your Account!</h3>
                            <span>Don't Have an Account?<a href="#" class="register-tab"> Sign In!</a></span>
                        </div>

                        <form method="post" id="utf-register-account-form" action="{{ route('register.submit') }}">
                            @csrf

                            <div class="utf-no-border">
                                <input type="text" class="utf-with-border" name="name" id="name" placeholder="Name"
                                    required/="" value="{{ old('name') }}">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="utf-no-border">
                                <input type="text" class="utf-with-border" name="email" id="email"
                                    placeholder="Email Address" required/="" value="{{ old('email') }}">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="utf-no-border">
                                <input type="text" class="utf-with-border" name="phone" id="phone"
                                    placeholder="Phone number (+216) " required/="" value="{{ old('phone') }}">
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
                                <input type="password" class="utf-with-border" name="password_confirmation"
                                    id="password" placeholder="Repeat Password" required/="">
                            </div>
                            <div class="checkbox margin-top-0">
                                <input type="checkbox" id="two-step0" required/>
                                <label for="two-step0"><span class="checkbox-icon"></span> I agree to the
                                    <a href="#">terms and conditions </a>  of the site .</label>
                            </div>
                        </form>
                        <button class="margin-top-10 button full-width utf-button-sliding-icon ripple-effect"
                            type="submit" form="utf-register-account-form">Register <i
                                class="icon-feather-chevron-right"></i></button>
                    </div>

                </div>
            </div>
        </div>
        @endauth
        @yield('scripts')
    </header>