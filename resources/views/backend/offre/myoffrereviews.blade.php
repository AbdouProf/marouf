@extends('backend.layouts.master')

@section('content')


<div class="utf-dashboard-content-inner-aera">
    <div class="row">
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">
                <div class="headline">
                    <h3>Avis des clients </h3>
                </div>
                <div class="content">
                    <ul class="utf-dashboard-box-list">
                       
                  
                        @foreach ($offres as $item)
                            @php
                            $user = \App\Models\user::where('id', $item->user_id)->first();
                            $offrereview =  \App\Models\OffreReview::where('offre_id', $item->id)->first();
                            @endphp
                         @if($offrereview != null )
                        <li>
                            <div class="utf-boxed-list-item-item">
                                <div class="item-content">
                                    <h4>{{ ucfirst($user->name) }}</h4>
                                    <div class="item-details margin-top-10">
                                        <div class="utf-detail-item"><i class="icon-material-outline-date-range"></i> dqsd </div>
                                        <div class="utf-star-rating" title="Rapidete" data-rating="{{$offrereview->rate}}"></div>
                                        <div class="utf-star-rating" title="Qualité" data-rating="{{$offrereview->rate2}}"></div>
                                        <div class="utf-star-rating" data-rating="{{$offrereview->rate3}}"></div>
                                    </div>
                                    <div class="utf-item-description">
                                        <p>{{$offrereview->review}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="utf-buttons-to-right"><a href="#small-dialog-1"
                                    class="popup-with-zoom-anim button dark ripple-effect margin-top-5 margin-bottom-10"><i
                                        class="icon-feather-edit"></i> Edit Your Review</a></div> -->
                        </li>
                        @else
                        <h1>  Pas encore d'avis </h1>
                        @endif

                        @endforeach
                      
                    </ul>
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
@endsection