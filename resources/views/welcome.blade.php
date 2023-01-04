@extends('frontend.layouts.master')

@section('content')
    @include('frontend.layouts.banner')
    @include('frontend.layouts.categorie')

    <!-- Jobs Category Boxes / End -->
    <!-- Jobs Category Boxes / End -->
    <!-- Latest Jobs -->
    <div class="section gray padding-top-60 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        <span>The latest requests</span>
                        <h3>Requests that might interest you</h3>
                        <div class="utf-headline-display-inner-item">The latest requests</div>
                        <p class="utf-slogan-text">
                            Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry
                            standard dummy text ever since when unknown printer took a galley.
                        </p>
                    </div>
                    @if (count($demande) > 0)
                        <div class="utf-listings-container-part compact-list-layout margin-top-35">
                            @foreach ($demande as $item)
                                <a href="{{route('demande.detail', $item->title)}}" class="utf-job-listing utf-apply-button-item">
                                    <div class="utf-job-listing-details">
                                        <div class="utf-job-listing-company-logo">
                                            @if ($item->cat_id == 1)

                                            <div class="utf-category-box-icon-item"><i class="icon-feather-shopping-bag1"></i></div>
                                            @elseif ($item->cat_id == 2)
                                            <div class="utf-category-box-icon-item"><i class="icon-feather-package1"></i></div>
                
                                            @else
                                            <div class="utf-category-box-icon-item"><i class="icon-material-outline-directions-car1"></i></div>
                
                                            @endif
                                        </div>
                                        <div class="utf-job-listing-description">
                                            @php
                                            $demande = \App\Models\Demande::where('id', $item->id)->first();
                                            @endphp
                                            @if ($item->cat_id == 1)
                                                <span class="dashboard-status-button green"><i
                                                        class="icofont-shopping-cart"></i>
                                                    {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                            @elseif($item->cat_id == 4)
                                                <span class="dashboard-status-button yellow"><i
                                                class="icofont-auto-mobile"></i>
                                                 {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                            @else
                                                <span class="dashboard-status-button red"><i
                                                        class="icofont-fast-delivery"></i>
                                                    {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                            @endif
                                            <h3 class="utf-job-listing-title" >
                                                {{ $item->title }}
                                            </h3>
                                            <div class="utf-job-listing-footer">
                                                <ul>
                                                    <li>
                                                        <i class="icon-material-outline-account-balance-wallet"></i>
                                                        {{ $item->Bmin }} TND - {{ $item->Bmax }} TND
                                                    </li>
                                                    <li><i class="icon-material-outline-location-on"></i> {{$item->Dadress}} - {{ \App\Models\State::where('id', $item->state_id)->value('name') }}</li>
                                                        @php
                                                        $to_date = \Carbon\Carbon::now();        
                                                        $from_date = \Carbon\Carbon::create( $demande->Std_close);
                                                        $answer_in_days = $to_date->diffInDays( $from_date, false);                                                        
                                                        @endphp
                                                    <li><i class="icon-material-outline-access-time"></i> <?php echo e($answer_in_days); ?>  Days</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <span class="list-apply-button ripple-effect">Discover the request
                                            <i class="icon-line-awesome-bullhorn"></i></span>

                                    </div>
                                    <span class="bookmark-icon add_to_wishlist" data-id="{{ $item->id }}" id="add_to_wishlist_{{ $item->id }}" > </span>
                                    
                                </a>
                            @endforeach


                        </div>
                    @endif

                    <div class="utf-centered-button margin-top-10">
                        <a href="{{route('demande.showall')}}"
                            class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-20">Discover all requests
                            <i class="icon-feather-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Jobs / End -->
    <!-- Start Section Callout -->
    <div class="jbm-section-callout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-xs-12 callout-bg-1 callout-section-left pos-relative">
                    <div class="callout-bg"></div>
                    <div class="jbm-callout-in jbm-callout-in-padding pull-right">
                        <div class="jbm-section-title margin-top-80 margin-bottom-80">
                            <h2>Vous etes une personne physique</h2>
                            <span class="section-tit-line"></span>
                            <p>
                                Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been
                                industry standard dummy text ever since, when an unknown printer took a galley of type and
                                scrambled it to make
                                a type specimen book. It has survived not only five centuries.
                            </p>
                            <a href="browse-companies.html"
                                class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Voir tous les
                                avantages <i class="icon-feather-chevrons-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-xs-12 callout-bg-2 callout-section-right pos-relative">
                    <div class="callout-bg"></div>
                    <div class="jbm-callout-in jbm-callout-in-padding pull-left">
                        <div class="jbm-section-title margin-bottom-80 margin-top-80">
                            <h2>Vous étes une entreprise</h2>
                            <span class="section-tit-line"></span>
                            <p>
                                Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been
                                industry standard dummy text ever since, when an unknown printer took a galley of type and
                                scrambled it to make
                                a type specimen book. It has survived not only five centuries.
                            </p>
                            <a href="jobs-list-layout-leftside.html"
                                class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Voir tous les
                                avantages <i class="icon-feather-chevrons-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section padding-top-65 padding-bottom-75">
        <div class="container">
            <div class="col-xl-12">
                <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                    <span>Service des clients</span>
                    <h3>Besoin d'aide?</h3>
                    <div class="utf-headline-display-inner-item">Service des clients</div>
                    <p class="utf-slogan-text">
                        Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry
                        standard dummy text ever since when unknown printer took a galley.
                    </p>
                </div>
            </div>
            <div class="row need-help-area justify-content-center">
                <div class="col-xl-4">
                    <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                            <div class="utf-icon-box-circle-inner">
                                <i class="icon-brand-rocketchat"></i>
                            </div>
                        </div>
                        <h4>Envoyer un mail</h4>
                        <p>Si vous avez une question, envoyez-nous un mail.</p>
                        <a href="javascript:void(0);"
                            class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Clique ici pour
                            discuter <i class="icon-feather-chevrons-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                            <div class="utf-icon-box-circle-inner">
                                <i class="icon-feather-phone"></i>
                            </div>
                        </div>
                        <h4>Notre agent d'assistance</h4>
                        <p>Notre agent de soutien travaillera avec vous pour répondre à vos besoins de prêt.</p>
                        <a href="contact.html"
                            class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Nous contacter <i
                                class="icon-feather-chevrons-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                            <div class="utf-icon-box-circle-inner">
                                <i class="icon-brand-bimobject"></i>
                            </div>
                        </div>
                        <h4>Comment ça marche</h4>
                        <p>Visitez notre guide et en savoir plus sur nos nouvelles et nos conseils</p>
                        <a href="blog-right-sidebar.html"
                            class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Visiter notre guide
                            <i class="icon-feather-chevrons-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonials -->
  <div class="section gray padding-top-65 padding-bottom-65">
    <div class="container">
      <div class="row">
        <div class="col-xl-12"> 
          <div class="utf-section-headline-item centered margin-top-0 margin-bottom-30">
            <span>Clients Say About Us</span>
			<h3>Candidates Testimonials</h3>
			<div class="utf-headline-display-inner-item">Clients Say About Us</div>
			<p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Categories Carousel -->
    <div class="utf-carousel-container-block">
      <div class="utf-testimonial-carousel-block testimonials"> 
        @foreach ($reviews as $item)
        @php
         $user = \App\Models\user::where('id', $item->user_id)->first();
         @endphp

        <div class="utf-carousel-review-item">
          <div class="utf-testimonial-box">
            <div class="utf-testimonial-avatar-photo"> <img src="{{ $user->image }}" alt=""> </div>
            <div class="utf-testimonial-author-utf-detail-item">
              <h4>{{ ucfirst($user->name) }}</h4>
              <span class="utf-star-rating" data-rating="{{$item->rate}}"></span>

			</div>
            <div class="testimonial">{{$item->review}}</div>
          </div>
        </div>   
        @endforeach   
      </div>
    </div>    
  </div>
  <!-- Testimonials / End --> 
    </section>
@endsection
@section('scripts')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>


    <script>
        $.noConflict();
        if ($(".utf-intro-banner-search-form-block")[0]) {
            setTimeout(function() {
                $(".pac-container").prependTo(".utf-intro-search-field-item.with-autocomplete");
            }, 300);
        }
    </script>
    
    <script>
        if (typeof jQuery !== 'undefined') {
            console.log('jQuery Loaded');
        } else {
            console.log('not loaded yet');
        }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    {{-- Add to wishlist --}}
     <script>
        $(document).on('click','.add_to_wishlist',function(e){
            e.preventDefault();
            var demande_id=$(this).data('id');

            var token="{{ csrf_token() }}";
            var path="{{route('wishlist.store')}}";

            console.log('++++++++++++')

            console.log(token)

            $.ajax({
                url:path,
                type:"POST",
                dataType:"JSON",
                data:{
                    demande_id:demande_id,
                    _token:token,
                },
                
                success:function(data){
                    console.log(data);
                    if(data['status']){
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title:"Good job",
                            text:data['message'],
                            icon:"success",
                            button:"OK!",
                        });
                    }
                    else if(data['present']){
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title:"Opps!",
                            text:data['message'],
                            icon:"warning",
                            button:"OK!",
                        });
                    }
                    else{
                        swal({
                            title:"Sorry!",
                            text:"Ypu can add that product",
                            icon:"error",
                            button:"OK!",
                        });
                    }
                },
                error:function(err){
                    console.log(err);
                }
            });

        });

    </script> 


@endsection
