
<div class="utf-dashboard-sidebar-item">
    
    <div class="utf-dashboard-sidebar-item-inner" data-simplebar="">
        <div class="utf-dashboard-nav-container">
            <!-- Responsive Navigation Trigger -->
            <a href="#" class="utf-dashboard-responsive-trigger-item">
                <span class="hamburger utf-hamburger-collapse-item">
                    <span class="utf-hamburger-box-item"> <span class="utf-hamburger-inner-item"></span> </span>
                </span>
                <span class="trigger-title">Dashboard Navigation Menu</span>
            </a>
            <!-- Navigation -->
            <div class="utf-dashboard-nav">
                <div class="utf-dashboard-nav-inner">
                    <div class="dashboard-profile-box">
                        @php
                            $image = explode(',', Auth::user()->image);
                        @endphp

                        @if (Auth::user()->image == NULL)
                        <span class="avatar-img">
                            <img src="{{asset('backend/assets/images/default.jpg')}}" class="photo">
                        </span>
                        @else
                        <span class="avatar-img">
                            <img src="/{{$image[0]}}" name="photo" class="photo" />
                        </span>
                        @endif
                       
                        <div class="user-profile-text">
                            @php
                                $first_name = explode(' ', auth()->user()->name);
                            @endphp
                            <span class="fullname">{{ ucfirst($first_name[0]) }}</span>
                            <span class="user-role">Balance : {{auth()->user()->solde}} TND</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ul>
                        <li class="active">
                            <a href="{{route('user-dash')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{route('demande.create')}}"><i class="icon-material-outline-add-circle-outline"></i>
                                Add a new request</a>
                        </li>
                        <li>
                            <a href="{{route('demande.show')}}"><i class="icon-material-outline-business-center"></i>
                                Manage my requests <span class="nav-tag">{{\App\Models\Demande::where('user_id',auth()->user()->id)->count()}}</span></a>
                        </li>

                        <li>
                            <a href="{{route('offre.show')}}"><i class="icon-material-outline-gavel"></i> Manage my offers<span class="nav-tag">{{\App\Models\Offre::where('user_id',auth()->user()->id)->count()}}</span></a>
                        </li>
                       
                        <li>
                            <a href="#"><i
                                    class="icon-material-outline-account-balance-wallet"></i> Manage my payments</a>
                                    <ul class="dropdown-nav">
                                        <li><a  href="{{route('userpay')}}"><i class="icon-feather-chevron-right"></i> My payments</a></li>
                                        <li><a  href="{{route('pay')}}"><i class="icon-feather-chevron-right"></i> Request a payment</a></li>
        
                                      </ul>
                        </li>

                        <li>
                            <a href="#"><i
                                    class="icon-material-outline-account-balance-wallet"></i> Manage my offers</a>
                                    <ul class="dropdown-nav">
                                        <li><a  href="{{route('offreencours.show')}}"><i class="icon-feather-chevron-right"></i> Offer in progress </a></li>
                                        <li><a  href="{{route('offrerefuser.show')}}"><i class="icon-feather-chevron-right"></i> Offer Refused </a></li>
                                        <li><a  href="{{route('offrecloturer.show')}}"><i class="icon-feather-chevron-right"></i> Offer closed </a></li>
        
                                      </ul>
                        </li>
                        <li>
                            <a href="{{route('all.rec')}}"><i class="icon-material-baseline-mail-outline"></i> Complaint  </a>
                        </li>

                        <li>
                            <a href="{{route('offre.userreview')}}"><i class="icon-feather-user"></i> Offer review</a>
                        </li>
                        <li>
                            <a href="{{route('users.reviews')}}"><i class="icon-material-outline-rate-review"></i> Notice </a>
                        </li>
                        <li>
                            <a href="dashboard-my-profile.html"><i class="icon-feather-user"></i> My Profile</a>
                        </li>
                        <li>
                            <a href="index-1.html"><i class="icon-material-outline-power-settings-new"></i>
                                Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
