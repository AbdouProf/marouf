@extends('backend.layouts.master')


@section('content')

<div class="utf-dashboard-content-inner-aera">
    <div class="row">

        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">
                <div class="headline">
                    <h3>Offres en cours </h3>
                </div>
                <div class="content">
                    <ul class="utf-dashboard-box-list">
                        @foreach ($offresencours as $item)
                        @php
                        $demande = \App\Models\Demande::where('id', $item->demande_id)->first();
                        @endphp
                        <li>
                            <div class="utf-manage-resume-overview-aera utf-manage-candidate">
                                <div class="utf-manage-resume-overview-aera-inner">
                                    <div class="utf-manage-resume-avatar">
                                        @if ($item->ostatus == "Offre Accepte")
                                        <div class="utf-verified-badge"></div>
                                        @elseif ($item->ostatus == 'Offre refuse')
                                        <div class="no-utf-verified-badge"></div>
                                        @endif

                                        <a href="#"><img src="img/user-avatar-placeholder.png" alt=""></a>
                                    </div>
                                    <div class="utf-manage-resume-item">
                                        @if ($demande->cat_id == 1)
                                        <span class="dashboard-status-button utf-job-status-item green"><i
                                                class="icofont-shopping-cart"></i>
                                            {{ \App\Models\Category::where('id', $demande->cat_id)->value('title')
                                            }}</span>
                                        @elseif($demande->cat_id == 4)
                                        <span class="dashboard-status-button  utf-job-status-item yellow"><i
                                                class="icofont-auto-mobile"></i>
                                            {{ \App\Models\Category::where('id', $demande->cat_id)->value('title')
                                            }}</span>
                                        @else
                                        <span class="dashboard-status-button utf-job-status-item yellow"><i
                                                class="icofont-fast-delivery"></i>
                                            {{ \App\Models\Category::where('id', $demande->cat_id)->value('title')
                                            }}</span>
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
                                        <span class="dashboard-status-button utf-status-item red"><i
                                                class="icon-material-outline-highlight-off"></i>
                                            {{ $item->ostatus }} </span>
                                        @endif

                                        @if ($item->ostatus == 'En attente de validation')
                                        <span class="dashboard-status-button utf-status-item yellow"><i
                                                class="icon-material-outline-gavel"> </i>
                                            {{ $item->ostatus }}
                                        </span>
                                        @endif

                                        @if ($item->ostatus == 'En attente annulation')
                                        <span class="dashboard-status-button utf-status-item yellow"><i
                                                class="icon-material-outline-gavel"> </i>
                                            Demande d'annulation
                                        </span>
                                        @endif

                                        <h4><a href="#">{{$demande->title}} @if($demande->country_id == 1 ) <img
                                                    class="flag" src="/img/flags/tn.svg" alt="" title="Tunisie"
                                                    data-tippy-placement="top"> @else
                                                <img class="flag" src="/img/flags/fr.svg" alt="" title="France"
                                                    data-tippy-placement="top"> @endif</a></h4>
                                                    @php
                                                    $canceloffre = \App\Models\canceloffre::where('offre_id', $item->id)->first();
                                                    @endphp
                                                    @if ($item->ostatus == 'En attente annulation')
                                        <span class="utf-manage-resume-detail-item" title="Reason d'annulation"><a href="#"><i
                                                    class="icon-feather-mail"></i>dqds</a></span>
                                                    @endif
                                        <span class="utf-manage-resume-detail-item"><i class="icon-feather-phone"></i>
                                            (+12) 0123-654-987</span>
                                        <span class="utf-manage-resume-detail-item"><a href="#"><i
                                                    class="icon-material-outline-location-on"></i>
                                                {{$demande->Dadress}}, {{ \App\Models\State::where('id',
                                                $demande->state_id)->value('name') }}</a></span>
                                        <div class="freelancer-rating">
                                            <div class="utf-detail-item"><i class="icon-material-outline-date-range"
                                                    title="Créer le"></i> {{ date_format($item->created_at, 'Y-M-d') }}
                                            </div>
                                            @php
                                            $reviews = App\Models\OffreReview::where('offre_id', $item->id)->get();
                                            @endphp
                                            @if (count( $reviews) != 0)
                                            @foreach ($reviews as $key => $review)
                                            <div class="utf-star-rating" data-rating="{{$review->rate}}" title="Review">
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="dashboard-task-inner-item">
                                            <ul class="dashboard-task-info bid-info">
                                                <li><span>Montant offre &nbsp;</span> <strong> {{ $item->Mnt_offre }}
                                                        TND</strong></li>
                                                @php
                                                $to_date = \Carbon\Carbon::now();
                                                $from_date = \Carbon\Carbon::create( $item->Std_close_Offre);
                                                $answer_in_days = $to_date->diffInDays( $from_date, false);

                                                @endphp
                                                @if ($answer_in_days < 0 || $answer_in_days==0 ) <li><span> Offre
                                                        Terminer </span>
                                                    @else
                                                    <li><span> Offre cloturée dans &nbsp;</span><strong>
                                                            <?php echo e($answer_in_days) ; ?> jours
                                                        </strong></li>
                                                    @endif
                                            </ul>
                                        </div>
                                        <div class="utf-buttons-to-right">
                                            @if ($item->ostatus == "En attente annulation")
                                            <div class="utf-buttons-to-right">
                                                <form action="{{route('accept.cancel',$item->id)}}" method="post" id="accepte-ann">
                                                    @csrf
                                                   
                                                </form>
                                            </div>
                                            <button class=" popup-with-zoom-animbutton button green ripple-effect"
                                            type="submit" form="accepte-ann"> <i class="icon-material-outline-check"> </i> Accepter
                                        </button>
                                           
                                            <div class="utf-buttons-to-right">
                                                <form action="{{route('refuse.cancel',$item->id)}}" method="post" id="refuser-ann">
                                                    @csrf
                                                   
                                                </form>
                                            </div>
                                            <button class="  button red ripple-effect"
                                            type="submit" form="refuser-ann"> <i class="icon-line-awesome-times"> </i> Refuser
                                        </button>
                                            @endif

                                            @if ($item->ostatus == "Offre refuse")
                                            <form class="float-left ml-1"
                                                action="{{ route('offre.delete', $item->id) }}" method="post"
                                                id="myForm">
                                                @csrf
                                                @method('delete')
                                                <a href="#" class="dltBtn button red ripple-effect"
                                                    data-id="{{ $item->id }}" title="Supprimer" data-toggle="tooltip"
                                                    data-tippy-placement="top">
                                                    <i class="icon-feather-trash-2"></i> Supprimer Offre
                                                </a>
                                            </form>
                                            @endif

                                            @if ($item->ostatus == "Offre Accepte")
                                            @if ($item->StatusOffreAccepter == 'Offre en cours')
                                            <a href="{{route('off-contact',$item->id)}}"
                                                class="button green"
                                                title="Rester en contact" data-tippy-placement="top"
                                                data-id="{{ $item->id }}">
                                                <i class="icon-brand-rocketchat"></i> Contact
                                            </a>
                                             <a href="#small-dialog-2{{ $item->id }}"
                                                class="popup-with-zoom-anim button ripple-effect " data-id="{{ $item->id }}"  ><i
                                                    class="icon-material-outline-rate-review"></i> Réclamation</a>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <div id="small-dialog-2{{ $item->id }}" class="zoom-anim-dialog mfp-hide dialog-with-tabs"> 
                            <div class="utf-signin-form-part">
                              <ul class="utf-popup-tabs-nav-item">
                                  <li class="modal-title">Réclamation</li>
                              </ul>
                        
                              <div class="utf-popup-container-part-tabs"> 
                                <div class="utf-popup-tab-content-item" id="tab2"> 
                                  <form method="post" action="{{ route('offre.rec', $item->id) }}" id="leave-review-form">
                                    @csrf
                                    
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="offre_id" value="{{ $item->id }}">
                                    <input type="hidden" name="demande_id" value="{{ $item->demande_id }}">

                                    <div class="utf-no-border">
                                        <input type="text" class="utf-with-border" name="robject" id="robject" placeholder="Objet" required/>
                                      </div>


                                    <textarea class="utf-with-border" placeholder="Réclamation" name="rdesc" id="rdesc" cols="7" required></textarea>
                                  </form>
                                  <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit" form="leave-review-form">Envoyer Réclamation <i class="icon-feather-chevron-right"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Leave a Review Popup / End --> 
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
                    {{$offresencours->appends($_GET)->links('vendor.pagination.custom')}}

                </nav>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
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