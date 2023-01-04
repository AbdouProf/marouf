<div class="section margin-top-60 margin-bottom-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                    <span>Choose a category</span>
                    <h3>A whole world of people need you !</h3>
                    <div class="utf-headline-display-inner-item">MAAROUF</div>
                    <p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting industry Lorem
                        Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
                </div>
            </div>
           
            <div class="col-xl-3 col-md-6 col-lg-4">
                <a href="{{route('search.akthili')}}" class="photo-box photo-category-box small"
                    data-background-image="img/shop.jpg">
                    <div class="utf-opening-position-counter-item">{{$a9thili->count()}} In progress </div>
                    <div class="utf-opening-box-content-part">
                        <div class="utf-category-box-icon-item"><i class="icon-feather-shopping-bag"></i></div>
                        <h3>A9thili</h3>
                        <span>{{\App\Models\Demande::where('cat_id',1)->count()}} Requests</span>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-4">
                <a href="{{route('search.livrili')}}" class="photo-box photo-category-box small"
                    data-background-image="img/deliv.jpg">
                    <div class="utf-opening-position-counter-item">{{$livrili->count()}} In progress</div>
                    <div class="utf-opening-box-content-part">
                        <div class="utf-category-box-icon-item"><i class="icon-feather-package"></i></div>
                        <h3>Livrili</h3>
                        <span>{{\App\Models\Demande::where('cat_id',2)->count()}} Requests</span>
                    </div>
                </a>
            </div>
            
            <div class="col-xl-3 col-md-6 col-lg-4">
                <a href="{{route('search.wasalni')}}"  class="photo-box photo-category-box small"
                    data-background-image="img/cou.jpg">
                    <div class="utf-opening-position-counter-item">{{$wasalni->count()}} In progress</div>
                    <div class="utf-opening-box-content-part">
                        <div class="utf-category-box-icon-item"><i class="icon-material-outline-directions-car"></i></div>
                        <h3>Wasalni</h3>
                        <span>{{\App\Models\Demande::where('cat_id',4)->count()}} Requests</span>
                    </div>
                </a>
            </div>
            <div class="col-xl-12 utf-centered-button margin-top-10">
                <a  href="{{route('demande.showall')}}"
                    class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Discover all requests
                    <i class="icon-feather-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
