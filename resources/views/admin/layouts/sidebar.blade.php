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
                      
                        <span class="avatar-img">
                            <img src="{{asset('backend/assets/images/abdou.jpg')}}" class="rounded-circle user-photo" alt="User Profile Picture">
                        </span>
                        <div class="user-profile-text">
                            <span class="fullname">Welcome Abdou</span>
                            <span class="user-role">Administrateur</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ul>
                        <li class="active">
                            <a href="dashboard.html"><i class="icon-material-outline-dashboard"></i> Dashboard</a>
                        </li>
                        
                       
                        <li>
                            <a href="#"><i
                                    class="icon-material-outline-account-balance-wallet"></i> Manage requests </a>
                                    <ul class="dropdown-nav">
                                        <li><a  href="{{route('demande.admin')}}"><i class="icon-feather-chevron-right"></i> Approve request </a></li>
                                        <li><a  href="{{route('paiement.all')}}"><i class="icon-feather-chevron-right"></i> All requests</a></li>
        
                                      </ul>
                        </li>
                        <li>
                            <a href="#"><i
                                    class="icon-material-outline-account-balance-wallet"></i> Manage payment </a>
                                    <ul class="dropdown-nav">
                                        <li><a  href="{{route('paiement.admin')}}"><i class="icon-feather-chevron-right"></i> Payment request</a></li>
                                        <li><a  href="{{route('paiement.all')}}"><i class="icon-feather-chevron-right"></i> All payments </a></li>
        
                                      </ul>
                        </li>
                        <li>
                            <a href="{{route('admin.allrec')}}"><i class="icon-material-outline-rate-review"></i> Complaint </a>
                        </li>
                        <li>
                            <a href="{{route('users.reviews')}}"><i class="icon-material-outline-rate-review"></i>  Review </a>
                        </li>
                      
                        <li>
                            <a   href="{{ route('home') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="icon-material-outline-power-settings-new"></i>
                                Déconnexion </a>
                                
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
