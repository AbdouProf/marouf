@extends('backend.layouts.master')


@section('content')
    <div class="utf-dashboard-content-inner-aera">
        <div class="row">
            <!-- Dashboard Box -->
            <div class="col-xl-12">
                <div class="dashboard-box margin-top-0">
                    <div class="headline">
                        <h3>Les offres reçus ( {{ $offres->count() }} ) : {{ ucfirst($demande->title) }}</h3>
                    </div>
                    <div class="content">
                        <ul class="utf-dashboard-box-list">
                            @foreach ($offres as $item)
                                <li>
                                    <div class="utf-manage-resume-overview-aera utf-manage-candidate">
                                        <div class="utf-manage-resume-overview-aera-inner">
                                            <div class="utf-manage-resume-avatar">
                                                @if ($item->ostatus == 'Offre Accepte')
                                                    <div class="utf-verified-badge"></div>
                                                @elseif ($item->ostatus == 'Offre refuse')
                                                    <div class="no-utf-verified-badge"></div>
                                                @endif
                                                <a href="#">
                                                    @php
                                                        $user = \App\Models\user::where('id', $item->user_id)->first();
                                                    @endphp
                                                    <img src="{{ $user->image }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="utf-manage-resume-item">
                                                <h4>

                                                    <a href="#">{{ $user->name }} <img class="flag"
                                                            src="img/flags/tn.svg" alt="" title="Tunisie"
                                                            data-tippy-placement="top" /></a>

                                                    @if ($item->ostatus == 'En attente de validation')
                                                        <span class="dashboard-status-button utf-status-item yellow"><i
                                                                class="icon-material-outline-gavel"> </i>
                                                            {{ $item->ostatus }}
                                                        </span>
                                                    @elseif ($item->ostatus == 'Offre refuse')
                                                        <span class="dashboard-status-button utf-status-item red"><i
                                                                class="icon-material-outline-highlight-off"></i>
                                                            {{ $item->ostatus }} </span>
                                                    @else
                                                        <span class="dashboard-status-button utf-status-item green"><i
                                                                class="icon-material-outline-check-circle"> </i>
                                                            {{ $item->ostatus }}
                                                        </span>
                                                    @endif


                                                    @if ($item->ostatus == 'Offre Accepte')
                                                        <span class="dashboard-status-button utf-status-item green"><i
                                                                class="icon-material-outline-access-time"></i>
                                                            {{ $item->StatusOffreAccepter }}
                                                        </span>
                                                    @endif
                                                </h4>
                                                <div class="freelancer-rating">
                                                    <div class="utf-detail-item"><i
                                                            class="icon-material-outline-date-range"></i>
                                                        {{ date_format($item->created_at, 'Y-M-d') }}
                                                    </div>
                                                    <div title="Niveau de confiance" data-tippy-placement="top"
                                                        class="utf-star-rating" data-rating="5.0"></div>
                                                </div>
                                                <span class="utf-manage-resume-detail-item"><i
                                                        class="icon-feather-phone"></i>
                                                    (+216)
                                                    {{ $user->phone }}</span>
                                                <span class="utf-manage-resume-detail-item">
                                                    <a href="#"><i class="icon-material-outline-location-on"></i>
                                                        Touzeur</a>
                                                </span>

                                                <div class="dashboard-task-inner-item">
                                                    <ul class="dashboard-task-info bid-info">
                                                        <li><strong>{{ $item->Mnt_offre }} TND </strong></li>
                                                        <li><span> Mission cloturée dans </span>
                                                            <strong> 1 jours </strong>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @if ($item->ostatus == 'Offre Accepte')
                                                    <div class="utf-buttons-to-right">
                                                        <a href="#small-dialog-4"
                                                            class="popup-with-zoom-anim button green ripple-effect"
                                                            title="Accept" data-tippy-placement="top">
                                                            <i class="icon-material-outline-check"></i> Cloturer l'offre
                                                        </a>
                                                        <a href="#small-dialog-2"
                                                            class="popup-with-zoom-anim button orange ripple-effect"
                                                            title="Accept" data-tippy-placement="top">
                                                            <i class="icon-material-outline-power-settings-new"></i> Demande
                                                            d'annulation
                                                        </a>
                                                        </a>

                                                    </div>
                                                @else
                                                    <div class="utf-buttons-to-right">
                                                        <a href="#small-dialog-1"
                                                            class="popup-with-zoom-anim button green ripple-effect accept.offre"
                                                            title="Accept" data-tippy-placement="top"
                                                            data-id="{{ $item->id }}"
                                                            id="accept.offre_{{ $item->id }}">
                                                            <i class="icon-material-outline-check"></i> Accepter l'offre
                                                        </a>


                                                        <span class="refused_offre button red ripple-effect"
                                                            title="Refuser" data-tippy-placement="top"  data-id="{{ $item->id }}"   >
                                                            <i class="icon-feather-trash-2"></i> Refuser l'offre
                                                    </span>
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bid Acceptance Popup -->
       

        <div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

            <div class="utf-signin-form-part">
                <ul class="utf-popup-tabs-nav-item">
                    <li class="modal-title">Accepter l'offre de </li>
                </ul>
                
                <div class="utf-popup-container-part-tabs">
                    <div class="utf-popup-tab-content-item" id="tab">
                        <div class="utf-welcome-text-item">
                            <div class="bid-acceptance margin-top-15">L'offre : 75 TND</div>
                        </div>
                        <form action="{{ route('offre.accept') }}" id="accept-form" method="post">
                            @csrf

                            <input type="text" name="offreid" id="offreid" />          
                            <div class="utf-section-headline-item  margin-bottom-12">
                                <h5>Méthode de paiement</h5>
                            </div>
                            <div class="radio">
                                <input id="radio-1" name="radio" type="radio" checked="">
                                <label for="radio-1"><span class="radio-label"></span> Avec mon solde {{$item->Mnt_offre}} </label>
                            </div>
                            <div class="radio">
                                <input id="radio-1" name="radio" type="radio" checked="">
                                <label for="radio-1"><span class="radio-label"></span> Carte bancaire</label>
                            </div>
                            <div class="radio">
                                <input id="radio-1" name="radio" type="radio" checked="">
                                <label for="radio-1"><span class="radio-label"></span> Paypal</label>
                            </div>
                            <div class="checkbox margin-top-12">
                                <input type="checkbox" id="chekcbox1" checked="">
                                <label for="chekcbox1"><span class="checkbox-icon"></span> <a href="#">J'accepte les
                                        conditions générales et la politique de confidentialité</a></label>
                            </div>
                        </form>
                        <button class="margin-top-15 button full-width utf-button-sliding-icon ripple-effect" type="submit"
                            form="accept-form">Accepter et payer <i class="icon-feather-chevrons-right"></i></button>



                    </div>
                </div>
            </div>
        </div>


        <!-- Bid Acceptance Popup / End -->
        <!-- Send Direct Message Popup -->

        
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
                        <form action="{{ route('offre.refused',$item->id) }}" method="post">
                            @csrf
                            <textarea name="textarea" cols="10" placeholder="Votre message" class="utf-with-border" required=""></textarea>
                        </form>
                        <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit"
                            form="send-pm">Envoyer la demande <i class="icon-feather-chevrons-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Send Direct Message Popup / End -->
        <!-- Send Direct Message Popup -->
        <div id="small-dialog-3" class="zoom-anim-dialog mfp-hide dialog-with-tabs user-message-box-item">
            <div class="utf-signin-form-part">
                <ul class="utf-popup-tabs-nav-item">
                    <li class="modal-title">Refuser cet offre</li>
                </ul>
                <input type="hidden" name="offreid" id="offreid"/>
                <div class="utf-popup-container-part-tabs">
                    <div class="utf-popup-tab-content-item" id="tab2">
                        <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit"
                            form="send-pm">Je refuse cet offre <i class="icon-feather-chevrons-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Send Direct Message Popup / End -->
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
                            <textarea class="utf-with-border" placeholder="Donner votre avis" name="message2" id="message2" cols="7"
                                required=""></textarea>
                        </form>
                        <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit"
                            form="leave-review-form">Cloturer la mission <i
                                class="icon-feather-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">

       <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.button').click(function(e) {
                var $offreid = $(this).data('id');
               

                e.preventDefault();
                console.log("**********");
                console.log($offreid);
               // document.getElementById('offreid').setAttribute('value', $offreid)
                $('#offreid').val($offreid);

            });
        </script> 

<script>
    $('.refused_offre').on('click', function(e) {


        e.preventDefault();
        var rowId = $(this).data('id');
        var token = "{{ csrf_token() }}";
        var path = "{{ route('offre.refused') }}"

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                _token: token,
                rowId: rowId,

            },
            success: function(data) {


                console.log(data);
                if (data['status']) {

                    swal({
                        title: "Offre Refuser!",
                        text: data['message'],
                        icon: "error",
                        button: "OK",
                    });
                } else {
                    swal({
                        title: "Opps!",
                        text: "Something went wrong",
                        icon: "warning",
                        button: "OK",
                    });
                }

            },
            error: function(err) {
                swal({
                    title: "Error!",
                    text: "Some error",
                    icon: "error",
                    button: "OK",
                });
                console.log(err);

            }

        });


    });
</script>
    @endsection
