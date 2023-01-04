@extends('backend.layouts.master')

@section('content')
<div class="utf-dashboard-content-inner-aera">
    <div class="row">
        <div class="col-xl-12">
          
            <div class="dashboard-box margin-top-0">
                <div class="headline">
                    <h3>Wishlist</h3>
                </div>
                <div class="content">
                    @if (Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count() > 0)
                    @include('frontend.wishlist._wishlist')
                    @else
                    <h1 style="color:red; text-align:center;">Wishlist Vide</h1>
                    @endif
                </div>      
            </div>


            <!-- Pagination -->
            <div class="clearfix"></div>
            <div class="utf-pagination-container-aera margin-top-50 margin-bottom-0">
                <nav class="pagination">
                    <ul>
                        <li class="utf-pagination-arrow">
                            <a href="#" class="ripple-effect"><i
                                    class="icon-material-outline-keyboard-arrow-left"></i></a>
                        </li>
                        <li><a href="#" class="ripple-effect current-page">1</a></li>
                        <li><a href="#" class="ripple-effect">2</a></li>
                        <li><a href="#" class="ripple-effect">3</a></li>
                        <li class="utf-pagination-arrow">
                            <a href="#" class="ripple-effect"><i
                                    class="icon-material-outline-keyboard-arrow-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection