@extends('backend.layouts.master')

@section('content')


<div class="utf-dashboard-content-inner-aera">
    <div class="row">
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">
                <div class="headline">
                    <h3>Visitor Reviews</h3>
                </div>
                <div class="content">
                    <ul class="utf-dashboard-box-list">
                        @php
                        $first_name = explode(' ', auth()->user()->name);
                         @endphp
                        <li>
                            <div class="utf-boxed-list-item-item">
                                <div class="item-content">
                                    <h4>{{ $first_name[0] }}</h4>
                                    <span class="utf-company-not-rated margin-bottom-5">Not Rated Reviews</span>
                                </div>
                            </div>
                            <div class="utf-buttons-to-right"><a href="#small-dialog-2"
                                    class="popup-with-zoom-anim button ripple-effect margin-top-5 margin-bottom-10"><i
                                        class="icon-material-outline-rate-review"></i> Leave Your Review</a></div>
                        </li>
                        @foreach ($reviews as $item)
                        @php
                         $user = \App\Models\user::where('id', $item->user_id)->first();
                         @endphp
                        <li>
                            <div class="utf-boxed-list-item-item">
                                <div class="item-content">
                                    <h4>{{ ucfirst($user->name) }}</h4>
                                    <div class="item-details margin-top-10">
                                        <div class="utf-detail-item"><i class="icon-material-outline-date-range"></i>  {{ date_format($item->created_at, 'Y-M-d H:i') }}</div>
                                        <div class="utf-star-rating" data-rating="{{$item->rate}}"></div>
                                    </div>
                                    <div class="utf-item-description">
                                        <p>{{$item->review}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="utf-buttons-to-right"><a href="#small-dialog-1"
                                    class="popup-with-zoom-anim button dark ripple-effect margin-top-5 margin-bottom-10"><i
                                        class="icon-feather-edit"></i> Edit Your Review</a></div> -->
                        </li>
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
                    {{$reviews->appends($_GET)->links('vendor.pagination.custom')}}

                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Leave a Review for Freelancer Popup -->
<div id="small-dialog-2" class="zoom-anim-dialog mfp-hide dialog-with-tabs"> 
    <div class="utf-signin-form-part">
      <ul class="utf-popup-tabs-nav-item">
          <li class="modal-title">Leave Your Review</li>
      </ul>
      <div class="utf-popup-container-part-tabs"> 
        <div class="utf-popup-tab-content-item" id="tab2"> 
          <form method="post" action="{{ route('user.review') }}" id="leave-review-form">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

              <div class="utf-welcome-text-item">
                <div class="feedback-yes-no">
                  <div class="leave-rating">
                    <input type="radio" name="rate" id="rating-radio-1" value="1" required>
                    <label for="rating-radio-1" class="icon-material-outline-star"></label>
                    <input type="radio" name="rate" id="rating-radio-2" value="2" required>
                    <label for="rating-radio-2" class="icon-material-outline-star"></label>
                    <input type="radio" name="rate" id="rating-radio-3" value="3" required>
                    <label for="rating-radio-3" class="icon-material-outline-star"></label>
                    <input type="radio" name="rate" id="rating-radio-4" value="4" required>
                    <label for="rating-radio-4" class="icon-material-outline-star"></label>
                    <input type="radio" name="rate" id="rating-radio-5" value="5" required>
                    <label for="rating-radio-5" class="icon-material-outline-star"></label>
                  </div>
                  <div class="clearfix"></div>
                </div>
            </div>
            <textarea class="utf-with-border" placeholder="Comment" name="review" id="message2" cols="7" required></textarea>
          </form>
          <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit" form="leave-review-form">Submit Review <i class="icon-feather-chevron-right"></i></button>
        </div>
      </div>
    </div>
  </div>
  <!-- Leave a Review Popup / End --> 

@endsection