@extends('backend.layouts.master')


@section('content')
<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
    <div class="row">
        <div class="col-xl-12">
            <h3>Offers received</h3>
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="index-1.html">Home</a></li>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <li>Offers received</li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="utf-dashboard-content-inner-aera">
    <div class="row">
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">
                <div class="headline">
                    <h3>Offers received ( {{ $offres->count() }} ) : {{ ucfirst($demande->title) }}</h3>
                </div>
                <div class="content">
                    @foreach ($offres as $item)
                    <ul class="utf-dashboard-box-list">

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
                                            <img src="/{{ $user->image }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="utf-manage-resume-item">
                                        <h4>

                                            <a href="#"> {{ ucfirst($user->name) }}<img class="flag"
                                                    src="img/flags/tn.svg" alt="" title="Tunisie"
                                                    data-tippy-placement="top" /></a>

                                            @if ($item->ostatus == 'En attente de validation')
                                            <span class="dashboard-status-button utf-status-item yellow"><i
                                                    class="icon-material-outline-gavel"> </i>
                                                Waiting for validation
                                            </span>
                                            @elseif ($item->ostatus == 'Offre refuse')
                                            <span class="dashboard-status-button utf-status-item red"><i
                                                    class="icon-material-outline-highlight-off"></i>
                                                {{ $item->ostatus }} </span>
                                            @elseif ($item->ostatus == 'En attente annulation')
                                            <span class="dashboard-status-button utf-status-item yellow"><i
                                                    class="icon-material-outline-gavel"> </i>
                                                {{ $item->ostatus }}
                                            </span>
                                            @else
                                            <span class="dashboard-status-button utf-status-item green"><i
                                                    class="icon-material-outline-check-circle"> </i>
                                                {{ $item->ostatus }}
                                            </span>
                                            @endif


                                            @if ($item->ostatus == 'Offre Accepte')
                                            @if ($item->StatusOffreAccepter == 'Offre en cours')
                                            <span class="dashboard-status-button utf-status-item green"><i
                                                    class="icon-material-outline-access-time"></i>
                                                {{ $item->StatusOffreAccepter }}
                                            </span>
                                            @else
                                            <span class="dashboard-status-button utf-status-item bleu"><i
                                                    class="icon-material-outline-check"></i>
                                                {{ $item->StatusOffreAccepter }}
                                            </span>
                                            @endif

                                            @endif

                                            @if ($item->ostatus == 'Offre refuse')
                                            @if ($item->StatusOffreAccepter == 'offre annuler')
                                            <span class="dashboard-status-button utf-status-item bleu"><i
                                                    class="icon-feather-alert-triangle"></i>
                                                {{ $item->StatusOffreAccepter }}
                                                @endif
                                                @endif
                                            </span>
                                        </h4>
                                        <div class="freelancer-rating">
                                            <div class="utf-detail-item"><i
                                                    class="icon-material-outline-date-range"></i>
                                                {{ date_format($item->created_at, 'Y-M-d') }}
                                            </div>
                                            <!--  <div title="Niveau de confiance" data-tippy-placement="top"
                                                class="utf-star-rating" data-rating="5.0"></div> -->
                                        </div>
                                        <span class="utf-manage-resume-detail-item"><i class="icon-feather-phone"></i>
                                            (+216)
                                            {{ $user->phone }}</span>


                                        <div class="dashboard-task-inner-item">
                                            <ul class="dashboard-task-info bid-info">
                                                <li><strong>{{ $item->Mnt_offre }} TND </strong></li>
                                                @php
                                                $to_date = \Carbon\Carbon::now();
                                                $from_date = \Carbon\Carbon::create( $item->Std_close_Offre);
                                                if ( $from_date->isPast() ) {
                                                $answer_in_days = 0 ;
                                                }
                                                else {
                                                $answer_in_days = $to_date->diff( $from_date, false)->format('%d days %h
                                                hours ');
                                                }

                                                @endphp
                                                @if ($answer_in_days < 0 || $answer_in_days==0 || $item->
                                                    StatusOffreAccepter == 'Offre cloturer' ) <li><span> Offre
                                                            Terminer </span>

                                                    </li>
                                                    @else
                                                    <li><span> Offer closed in &nbsp; </span>
                                                        <strong>
                                                            <?php echo e($answer_in_days) ; ?>
                                                        </strong>
                                                    </li>
                                                    @endif
                                            </ul>
                                        </div>
                                        @if ($item->ostatus == 'Offre Accepte')
                                        @if ($item->StatusOffreAccepter == 'Offre en cours')
                                        <div class="utf-buttons-to-right">
                                            <a href="#small-dialog-4{{ $item->id }}"
                                                class="popup-with-zoom-anim button green ripple-effect" title="Accept"
                                                data-tippy-placement="top" data-id="{{ $item->id }}">
                                                <i class="icon-material-outline-check"></i> Close
                                            </a>
                                            <a href="#small-dialog-2{{ $item->id }}"
                                                class="popup-with-zoom-anim button orange ripple-effect" title="Accept"
                                                data-tippy-placement="top" data-id="{{ $item->id }}">
                                                <i class="icon-material-outline-power-settings-new"></i> Cancel
                                            </a>
                                            <a href="{{route('off-contact',$item->id)}}" class=" button red "
                                                title="Rester en contact" data-tippy-placement="top"
                                                data-id="{{ $item->id }}">
                                                <i class="icon-brand-rocketchat"></i> Contact
                                            </a>
                                            <a href="#small-dialog-3{{ $item->id }}"
                                                class="popup-with-zoom-anim button ripple-effect "
                                                data-id="{{ $item->id }}"><i
                                                    class="icon-material-outline-rate-review"></i> Claim </a>

                                        </div>
                                        @endif
                                        @elseif ($item->ostatus == 'Offre refuse')
                                        <div class="utf-buttons-to-right">
                                            <!-- <form class="float-left ml-1" action="{{ route('offre.delete', $item->id) }}" method="post"
                        id="myForm">
                        @csrf
                        @method('delete')
                        <a href="#" class="dltBtn button red ripple-effect" data-id="{{ $item->id }}" title="Supprimer"
                            data-toggle="tooltip" data-tippy-placement="top">
                            <i class="icon-feather-trash-2"></i> Supprimer Demande
                        </a>
                    </form> -->
                                        </div>
                                        @elseif ($item->ostatus == 'En attente de validation')
                                        <div class="utf-buttons-to-right">
                                            <a href="#small-dialog-1{{ $item->id }}"
                                                class="popup-with-zoom-anim button green ripple-effect accept.offre"
                                                title="Accept" data-tippy-placement="top" data-id="{{ $item->id }}"
                                                id="accept.offre_{{ $item->id }}">
                                                <i class="icon-material-outline-check"></i> Accept
                                            </a>
                                            <span class="refused_offre button red ripple-effect" title="Refuser"
                                                data-tippy-placement="top" data-id="{{ $item->id }}">
                                                <i class="icon-line-awesome-close"></i> Refuse
                                            </span>
                                            <form id="refused">
                                            </form>
                                            </a>
                                        </div>
                                        @else
                                        <div class="utf-buttons-to-right">

                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div id="small-dialog-1{{ $item->id }}" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
                        @php
                        $user = \App\Models\user::where('id', $item->user_id)->first();
                        $mnt = $item->Mnt_offre + ($item->Mnt_offre*0.05)
                        @endphp


                        <div class="utf-signin-form-part">
                            <ul class="utf-popup-tabs-nav-item">
                                <li class="modal-title">Accept the offer of {{ ucfirst($user->name) }} </li>
                            </ul>

                            <div class="utf-popup-container-part-tabs">
                                <div class="utf-popup-tab-content-item" id="tab">
                                    <div class="utf-welcome-text-item">
                                        <div class="bid-acceptance margin-top-15">The offer : {{ $item->Mnt_offre }} TND
                                        </div>

                                    </div>
                                    <div class="notification notice closeable">
                                        <p>Total amount to pay : <strong>
                                                <?php echo e($mnt) ; ?> TND
                                            </strong> </p>
                                    </div>

                                    <form action="{{ route('offre.accept',$item->id) }}" id="accept-form" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                                        <input type="hidden" name="offreid" />
                                        <br>

                                        <div class="utf-section-headline-item  margin-bottom-12">
                                            <h5>Method of payment</h5>
                                        </div>

                                        @if ($authuser->solde > $item->Mnt_offre)
                                        <div class="radio">
                                            <input id="radio-1" name="radio" type="radio" value="solde">
                                            <label for="radio-1"><span class="radio-label"></span> With my balance
                                            </label>
                                        </div>
                                        @endif
                                        <div class="radio">
                                            <input id="radio-2" name="radio" type="radio" value="carte" checked>
                                            <label for="radio-2"><span class="radio-label"></span> Credit card </label>
                                        </div>
                                        <br>

                                        <div class="checkbox margin-top-12">
                                            <input type="checkbox" id="chekcbox1" checked="" required>
                                            <label for="chekcbox1"><span class="checkbox-icon"></span> <a href="#">I agree to the terms and conditions </a></label>
                                        </div>
                                    </form>
                                    <button
                                        class="margin-top-15 button full-width utf-button-sliding-icon ripple-effect"
                                        type="submit" form="accept-form">Accept and pay <i
                                            class="icon-feather-chevrons-right"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="small-dialog-2{{ $item->id }}"
                        class="zoom-anim-dialog mfp-hide dialog-with-tabs user-message-box-item">
                        <div class="utf-signin-form-part">
                            <ul class="utf-popup-tabs-nav-item">
                                <li class="modal-title">Request for cancellation of the mission</li>
                            </ul>
                            <div class="utf-popup-container-part-tabs">
                                <div class="utf-popup-tab-content-item" id="tab2">
                                    <div class="utf-section-headline-item  margin-bottom-12">
                                        <h5>Please specify the reasons for cancellation:</h5>
                                    </div>
                                    <form action="{{ route('offre.cancel',$item->id) }}" method="post" id="send-pm">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="offre_id" value="{{ $item->id }}">
                                        <textarea name="reason" cols="10" placeholder="Your message"
                                            class="utf-with-border" required=""></textarea>
                                    </form>
                                    <button class="button full-width utf-button-sliding-icon ripple-effect"
                                        type="submit" form="send-pm">Send claim <i
                                            class="icon-feather-chevrons-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="small-dialog-4{{ $item->id }}" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
                        <div class="utf-signin-form-part">
                            <ul class="utf-popup-tabs-nav-item">
                                <li class="modal-title end-title">Close the mission</li>
                            </ul>
                            <div class="utf-popup-container-part-tabs">
                                <div class="utf-popup-tab-content-item" id="tab2">
                                    <form action="{{ route('offre.review', $item->id) }}" method="post"
                                        id="leave-review-form">
                                        @csrf
                                        <!-- <input type="hidden" name="offreid" id="offreid"/> -->
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="offre_id" value="{{ $item->id }}">
                                        <div class="utf-welcome-text-item">
                                            Global note of the mission
                                            <div class="feedback-yes-no">
                                                <div class="leave-rating">
                                                    <input type="radio" name="rate" id="rating-radio-1" value="1"
                                                        required="">
                                                    <label for="rating-radio-1"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate" id="rating-radio-2" value="2"
                                                        required="">
                                                    <label for="rating-radio-2"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate" id="rating-radio-3" value="3"
                                                        required="">
                                                    <label for="rating-radio-3"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate" id="rating-radio-4" value="4"
                                                        required="">
                                                    <label for="rating-radio-4"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate" id="rating-radio-5" value="5"
                                                        required="">
                                                    <label for="rating-radio-5"
                                                        class="icon-material-outline-star"></label>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="utf-welcome-text-item">
                                            Speed of service
                                            <div class="feedback-yes-no">
                                                <div class="leave-rating">
                                                    <input type="radio" name="rate2" id="rating-radio-21" value="1"
                                                        required="">
                                                    <label for="rating-radio-21"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate2" id="rating-radio-22" value="2"
                                                        required="">
                                                    <label for="rating-radio-22"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate2" id="rating-radio-23" value="3"
                                                        required="">
                                                    <label for="rating-radio-23"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate2" id="rating-radio-24" value="4"
                                                        required="">
                                                    <label for="rating-radio-24"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate2" id="rating-radio-25" value="5"
                                                        required="">
                                                    <label for="rating-radio-25"
                                                        class="icon-material-outline-star"></label>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="utf-welcome-text-item">
                                            Quality of service
                                            <div class="feedback-yes-no">
                                                <div class="leave-rating">
                                                    <input type="radio" name="rate3" id="rating-radio-31" value="1"
                                                        required="">
                                                    <label for="rating-radio-31"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate3" id="rating-radio-32" value="2"
                                                        required="">
                                                    <label for="rating-radio-32"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate3" id="rating-radio-33" value="3"
                                                        required="">
                                                    <label for="rating-radio-33"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate3" id="rating-radio-34" value="4"
                                                        required="">
                                                    <label for="rating-radio-4"
                                                        class="icon-material-outline-star"></label>
                                                    <input type="radio" name="rate3" id="rating-radio-35" value="5"
                                                        required="">
                                                    <label for="rating-radio-35"
                                                        class="icon-material-outline-star"></label>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <textarea class="utf-with-border" placeholder="Give your opinion" name="review"
                                            id="comments" cols="7" required=""></textarea>
                                    </form>
                                    <button class="button full-width utf-button-sliding-icon ripple-effect"
                                        type="submit" form="leave-review-form">Close the mission <i
                                            class="icon-feather-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="small-dialog-3{{ $item->id }}" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
                        <div class="utf-signin-form-part">
                            <ul class="utf-popup-tabs-nav-item">
                                <li class="modal-title">Claim</li>
                            </ul>

                            <div class="utf-popup-container-part-tabs">
                                <div class="utf-popup-tab-content-item" id="tab2">
                                    <form method="post" action="{{ route('offre.rec', $item->id) }}"
                                        id="leave-review-form">
                                        @csrf

                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="offre_id" value="{{ $item->id }}">
                                        <input type="hidden" name="demande_id" value="{{ $item->demande_id }}">
                                        <div class="utf-no-border">
                                            <input type="text" class="utf-with-border" name="robject" id="robject"
                                                placeholder="Subject" required />
                                        </div>


                                        <textarea class="utf-with-border" placeholder="Message" name="rdesc" id="rdesc"
                                            cols="7" required></textarea>
                                    </form>
                                    <button class="button full-width utf-button-sliding-icon ripple-effect"
                                        type="submit" form="leave-review-form">Send claim <i
                                            class="icon-feather-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Bid Acceptance Popup -->

    <!-- Bid Acceptance Popup / End -->
    <!-- Send Direct Message Popup -->



    <!-- Send Direct Message Popup / End -->
    <!-- Send Direct Message Popup -->
    <div id="small-dialog-5" class="zoom-anim-dialog mfp-hide dialog-with-tabs user-message-box-item">
        <div class="utf-signin-form-part">
            <ul class="utf-popup-tabs-nav-item">
                <li class="modal-title">Refuser cet offre</li>
            </ul>
            <!-- <input type="hidden" name="offreid" id="offreid"/> -->
            <div class="utf-popup-container-part-tabs">
                <div class="utf-popup-tab-content-item" id="tab2">
                    <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit"
                        form="send-pm">Je
                        refuse cet offre <i class="icon-feather-chevrons-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- Send Direct Message Popup / End -->
<!-- Leave a Review for Freelancer Popup -->

@endsection
@section('scripts')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<script src="{{ asset('backend/assets/bundles/libscripts.bundle.js') }}"></script>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>


<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.bt').click(function(e) {
            e.preventDefault();
            const $offreid = $(this).data('id');

            console.log("**********");
            console.log($offreid);
            document.getElementById('offreid').innerHTM = $offreid;
            //$("#offreid").val($offreid);


        });
</script>

<script>
    $('.refused_offre').on('click', function(e) {


            e.preventDefault();
            var rowId = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('offre.refused') }}"
            var form = $(this).closest('form');




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
                            button: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                $('#refused').submit();
                            }
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

<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e) {
            var form = $(this).closest('form');
            var dataId = $(this).data('id');
            e.preventDefault();
            swal({
                    title: "vous êtes sûr ?",
                    text: "Une fois supprimé, vous ne pourrez pas récupérer cette offre!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#myForm').submit();;
                        swal(" Bien ! L'offre a été supprimé!", {
                            icon: "success",
                        });
                    } else {
                        swal("Cette offre n'est pas supprimer!");
                    }
                });
        });
</script>
@endsection