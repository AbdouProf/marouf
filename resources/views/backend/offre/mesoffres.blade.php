@extends('frontend.layouts.master')

@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Mes offres</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="index-1.html">Accueil</a></li>
                            <li>Mes offres</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
      
        <div class="row">
            <div class="utf-companies-list-aera">
                <div class="col-xl-12">
                  
                       
                        <div class="row">
                            @foreach ($offres as $item)
                            @php
                            $demande = \App\Models\Demande::where('id', $item->demande_id)->first();
                            @endphp
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="utf-company-inner-alignment">
                                    <a href="single-company-profile.html" class="company">
                                        @if ($item->ostatus == "Offre Accepte")
                                        <div class="featured-type featured">Accepted</div>
                                        @elseif($item->ostatus == "Offre refuse")
                                        <div class="featured-type featuredd">Refused</div>
                                        @endif
                                        
                                        @if ($demande->cat_id == 1)
                                        <span class="dashboard-status-button utf-job-status-item green"><i
                                                class="icofont-shopping-cart"></i>
                                            {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                         @elseif($demande->cat_id == 4)
                                        <span class="dashboard-status-button  utf-job-status-item yellow"><i
                                                class="icofont-auto-mobile"></i>
                                            {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                         @else
                                        <span class="dashboard-status-button utf-job-status-item yellow"><i
                                                class="icofont-fast-delivery"></i>
                                            {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                        @endif
                                        <div class="featured-type featured"></div>
                                         <span class="company-logo"><img src="img/company_logo_1.png"
                                                    alt=""></span>
                                            <h4>{{$demande->title}}</h4>
                                            <h5 class="utf-job-listing-company"><span><i class="icon-feather-briefcase"></i>
                                                    Web Designer, Web Developers</span></h5>
                                            <p class="text-muted"><i class="icon-material-outline-location-on"></i> {{$demande->Dadress}},  {{ \App\Models\State::where('id', $demande->state_id)->value('name') }}</p>
                                            @php
                                            $reviews = App\Models\OffreReview::where('offre_id', $item->id)->get();
                                            @endphp
                                            @if (count( $reviews) != 0)
                                            @foreach ($reviews as $key => $review)
                                            <div class="utf-star-rating" data-rating="{{$review->rate}}" title="Review"></div>
                                            @endforeach
                                            @endif
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                  
                </div>
            </div>
         
        </div>


         <!-- Pagination -->
         <div class="row">
            <div class="col-md-12">
                <div class="utf-pagination-container-aera margin-top-30 margin-bottom-60">
                    <nav class="pagination">
                        {{$offres->appends($_GET)->links('vendor.pagination.custom')}}

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
