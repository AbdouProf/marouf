@extends('backend.layouts.master')


@section('content')

<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
    <div class="row">
        <div class="col-xl-12">
            <h3>Detail of the mission</h3>
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="index-1.html">Home</a></li>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <li>Detail of the mission</li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="utf-dashboard-content-inner-aera">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="dashboard-box margin-top-0">
                                    <div class="headline">
                                        @php

                                        @endphp
                                        <h3>Detail of the mission : {{ ucfirst($demande->title) }}</h3>
                                    </div>
                                    <div class="content">
                                        <div class="row">
                                            <!-- Dashboard Box -->
                                            <div class="col-xl-12">
                                                <div class="dashboard-box margin-top-0">
                                                    <div class="content">
                                                        <ul class="utf-dashboard-box-list">
                                                            <li>
                                                                <div class="utf-manage-resume-overview-aera utf-manage-candidate">
                                                                    <div class="utf-manage-resume-overview-aera-inner">
                                                                        <div class="utf-manage-resume-avatar">
                                                                            <div class="utf-verified-badge"></div>
                                                                            <a href="#">
                                                                                <img  src="/{{ $user->image }}" alt="" />
                                                                            </a>
                                                                        </div>
                                                                        <div class="utf-manage-resume-item">
                                                                            <h4>
                                                                                <a href="#"> {{ ucfirst($user->name) }}<img class="flag" src="img/flags\tn.svg" alt="" title="Tunisie" data-tippy-placement="top" /></a>
                                                                                <span class="dashboard-status-button utf-status-item green"><i class="icon-material-outline-check-circle"></i> offer accepted </span>
                                                                                <span class="dashboard-status-button utf-status-item green"><i class="icon-material-outline-access-time"></i> Mission in progress</span>
                                                                            </h4>
                                                                            <div class="freelancer-rating">
                                                                                <div class="utf-detail-item"><i class="icon-material-outline-date-range"></i>  {{ date_format($offre->created_at, 'Y-M-d') }}</div>
                                                                            </div>
                                                                            <span class="utf-manage-resume-detail-item"><i class="icon-feather-phone"></i> (+216)  {{ $user->phone }}</span>
                                                                          

                                                                            <div class="dashboard-task-inner-item">
                                                                                <ul class="dashboard-task-info bid-info">
                                                                                    @php
                                                                                    $to_date = \Carbon\Carbon::now();
                                                                                    $from_date = \Carbon\Carbon::create( $offre->Std_close_Offre);
                                                                                    $answer_in_days = $to_date->diffInDays( $from_date, false);
                                                                                    @endphp
                                                                                    <li><strong>{{ $offre->Mnt_offre }} TND</strong></li>
                                                                                    <li><span>Mission closed in &nbsp; </span> <strong>   <?php echo e($answer_in_days) ; ?> days</strong></li>
                                                                                </ul>
                                                                            </div>
                                                                           <!-- <div class="utf-buttons-to-right opacity1">
                                                                                <a href="#small-dialog-4" class="popup-with-zoom-anim button green ripple-effect" title="Accept" data-tippy-placement="top">
                                                                                    <i class="icon-material-outline-check"></i> Cloturer l'offre
                                                                                </a>
                                                                                <a href="#small-dialog-2" class="popup-with-zoom-anim button orange ripple-effect" title="Accept" data-tippy-placement="top">
                                                                                    <i class="icon-material-outline-power-settings-new"></i> Demande d'annulation
                                                                                </a>
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="utf-dashboard-box-list">
                                            @foreach ($commets as $item)
                                            @php
                                            $userc = \App\Models\user::where('id', $item->user_id)->first();
                                            @endphp

                                            <li>
                                                <div class="utf-boxed-list-item-item">
                                                    <div class="item-content">
                                                        <h4> {{ ucfirst($userc->name) }}</h4>
                                                        <div class="item-details margin-top-10">
                                                            <div class="utf-detail-item"><i class="icon-material-outline-date-range"></i>  {{ date_format($item->created_at, 'Y-M-d H:i') }}</div>
                                                        </div>
                                                        <div class="utf-item-description">
                                                            <p>
                                                                {{$item->com}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach

                                          
                                        </ul>
                                        <section id="contact" class="margin-bottom-50">
                                            <div class="utf-contact-form-item">
                                                <form  action="{{ route('offre.com', $offre->id) }}" method="post" name="contactform" id="contactform">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="offre_id" value="{{ $offre->id }}">
        
                                                    <div>
                                                        <textarea class="utf-with-border" name="com" cols="40" rows="3" id="com" placeholder="Message..." required=""></textarea>
                                                    </div>
                                                    <div class="utf-centered-button margin-top-10">
                                                        <button type="submit" class="submit button" id="submit" value="" > Send </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <!-- Edit Review Popup -->
        <div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
            <div class="utf-signin-form-part">
                <ul class="utf-popup-tabs-nav-item">
                    <li class="modal-title">Change Your Review</li>
                </ul>
                <div class="utf-popup-container-part-tabs">
                    <div class="utf-popup-tab-content-item" id="tab1">
                        <form method="post" id="change-review-form">
                            <div class="utf-welcome-text-item">
                                <div class="feedback-yes-no">
                                    <div class="leave-rating">
                                        <input type="radio" name="rating" id="rating-1" value="1" checked />
                                        <label for="rating-1" class="icon-material-outline-star"></label>
                                        <input type="radio" name="rating" id="rating-2" value="2" />
                                        <label for="rating-2" class="icon-material-outline-star"></label>
                                        <input type="radio" name="rating" id="rating-3" value="3" />
                                        <label for="rating-3" class="icon-material-outline-star"></label>
                                        <input type="radio" name="rating" id="rating-4" value="4" />
                                        <label for="rating-4" class="icon-material-outline-star"></label>
                                        <input type="radio" name="rating" id="rating-5" value="5" />
                                        <label for="rating-5" class="icon-material-outline-star"></label>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <textarea class="utf-with-border" placeholder="Comment" name="message" id="message" cols="7" required="">Lorem Ipsum is simply dummy text of printing and type setting industry.</textarea>
                        </form>
                        <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit" form="change-review-form">Save Changes <i class="icon-feather-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Review Popup / End -->

        <!-- Leave a Review for Freelancer Popup -->
        <div id="small-dialog-2" class="zoom-anim-dialog mfp-hide dialog-with-tabs user-message-box-item">
            <div class="utf-signin-form-part">
                <ul class="utf-popup-tabs-nav-item">
                    <li class="modal-title">Demande d'annulation de la mission</li>
                </ul>
                <div class="utf-popup-container-part-tabs">
                    <div class="utf-popup-tab-content-item" id="tab2">
                        <div class="utf-section-headline-item  margin-bottom-12">
                            <h5>Merci de spécifier les raison d'annulation:</h5>
                        </div>
                        <form method="post" id="send-pm">
                            <textarea name="textarea" cols="10" placeholder="Votre message" class="utf-with-border" required=""></textarea>
                        </form>
                        <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit" form="send-pm">Envoyer la demande <i class="icon-feather-chevrons-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Leave a Review Popup / End -->

        <!-- Leave a Review for Freelancer Popup -->
        <div id="small-dialog-4" class="zoom-anim-dialog mfp-hide dialog-with-tabs"> 
          <div class="utf-signin-form-part">
            <ul class="utf-popup-tabs-nav-item">
            <li class="modal-title end-title">Cloturer la mission</li>
          </ul>
            <div class="utf-popup-container-part-tabs"> 
              <div class="utf-popup-tab-content-item" id="tab2"> 
                <form method="post" id="leave-review-form">
              <div class="utf-welcome-text-item">
                Rapidité du service
                <div class="feedback-yes-no">
                <div class="leave-rating">
                  <input type="radio" name="rating" id="rating-radio-1" value="1" required="">
                  <label for="rating-radio-1" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-2" value="2" required="">
                  <label for="rating-radio-2" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-3" value="3" required="">
                  <label for="rating-radio-3" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-4" value="4" required="">
                  <label for="rating-radio-4" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-5" value="5" required="">
                  <label for="rating-radio-5" class="icon-material-outline-star"></label>
                </div>
                <div class="clearfix"></div>
                </div>
              </div>
              <div class="utf-welcome-text-item">
                Qualité du service
                <div class="feedback-yes-no">
                <div class="leave-rating">
                  <input type="radio" name="rating" id="rating-radio-1" value="1" required="">
                  <label for="rating-radio-1" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-2" value="2" required="">
                  <label for="rating-radio-2" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-3" value="3" required="">
                  <label for="rating-radio-3" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-4" value="4" required="">
                  <label for="rating-radio-4" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-5" value="5" required="">
                  <label for="rating-radio-5" class="icon-material-outline-star"></label>
                </div>
                <div class="clearfix"></div>
                </div>
              </div>
              <div class="utf-welcome-text-item">
                Note global de la mission
                <div class="feedback-yes-no">
                <div class="leave-rating">
                  <input type="radio" name="rating" id="rating-radio-1" value="1" required="">
                  <label for="rating-radio-1" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-2" value="2" required="">
                  <label for="rating-radio-2" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-3" value="3" required="">
                  <label for="rating-radio-3" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-4" value="4" required="">
                  <label for="rating-radio-4" class="icon-material-outline-star"></label>
                  <input type="radio" name="rating" id="rating-radio-5" value="5" required="">
                  <label for="rating-radio-5" class="icon-material-outline-star"></label>
                </div>
                <div class="clearfix"></div>
                </div>
              </div>
                  <textarea class="utf-with-border" placeholder="Donner votre avis" name="message2" id="message2" cols="7" required=""></textarea>
                </form>
                <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit" form="leave-review-form">Cloturer la mission <i class="icon-feather-chevron-right"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- Leave a Review Popup / End -->
                        
@endsection
