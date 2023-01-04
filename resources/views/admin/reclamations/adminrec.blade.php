@extends('admin.layouts.master')


@section('content')
<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
  <div class="row">
      <div class="col-xl-12">
          <h3>Respond to a claim  </h3>
          <nav id="breadcrumbs">
              <ul>
                  <li><a href="index-1.html">Home</a></li>
                  <li><a href="dashboard.html">Dashboard</a></li>
                  <li>Respond to a claim </li>
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

                    $demandeur = App\Models\User::where('id', $demande->user_id)->first();
                    $offreur = App\Models\User::where('id', $offre->user_id)->first();
                    @endphp
                    <h3>Claim for the mission : {{ ucfirst($demande->title) }}</h3>
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
                                                            <img src="/{{ $demandeur->image }}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="utf-manage-resume-item">
                                                        <h4>
                                                            <a href="#"> {{ ucfirst($demandeur->name) }}<img
                                                                    class="flag" src="img/flags\tn.svg" alt=""
                                                                    title="Tunisie" data-tippy-placement="top" /></a>
                                                            <span
                                                                class="dashboard-status-button utf-status-item yellow"><i
                                                                    class="icon-feather-user"></i>
                                                                Demandeur</span>
                                                            @if ($recs->rstatus == 'en cours')
                                                            <span
                                                                class="dashboard-status-button utf-status-item green"><i
                                                                    class="icon-material-outline-access-time"></i>
                                                                    Claim in progress</span>
                                                            @else
                                                            <span
                                                                class="dashboard-status-button utf-status-item green"><i
                                                                    class="icon-material-outline-check-circle"></i>
                                                                Réclamation Terminer</span>
                                                            @endif

                                                        </h4>

                                                        <span class="utf-manage-resume-detail-item"><i
                                                                class="icon-feather-phone"></i> (+216) {{
                                                            $demandeur->phone
                                                            }}</span>
                                                        <div class="utf-buttons-to-right ">
                                                            <div class="utf-buttons-to-right ">
                                                                <form action="{{ route('clo.rec',$recs->id) }}"
                                                                    method="post" id="send-pm">
                                                                    @csrf
                                                                    <input type="hidden" name="rec_id"
                                                                        value="{{ $recs->id }}">

                                                                </form>
                                                            </div>
                                                            @if ($recs->rstatus != 'Terminer')
                                                            <button class=" button green ripple-effect  " type="submit"
                                                                form="send-pm"> <i
                                                                    class="icon-material-outline-check"></i> Close claim
                                                            </button>
                                                            <div class="utf-buttons-to-right ">

                                                                <form action="{{ route('refund.rec',$recs->id) }}"
                                                                    method="post" id="send-ref">
                                                                    @csrf
                                                                    <input type="hidden" name="rec_id"
                                                                        value="{{ $recs->id }}">

                                                                </form>
                                                            </div>
                                                            <button class="button yellow ripple-effect " type="submit"
                                                                form="send-ref"> <i
                                                                    class="icon-material-outline-check"></i> Refunded
                                                            </button>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <!-- Dashboard Box -->
                                        <div class="col-xl-12">
                                            <div class="dashboard-box margin-top-0">
                                                <div class="content">
                                                    <ul class="utf-dashboard-box-list">
                                                        <li>
                                                            <div
                                                                class="utf-manage-resume-overview-aera utf-manage-candidate">
                                                                <div class="utf-manage-resume-overview-aera-inner">
                                                                    <div class="utf-manage-resume-avatar">
                                                                        <div class="utf-verified-badge"></div>
                                                                        <a href="#">
                                                                            @if ($offreur->image == NULL)
                                                                            <img src="{{asset('backend/assets/images/default.jpg')}}"
                                                                                alt="" />
                                                                            @else
                                                                            <img src="/{{ $offreur->image }}" alt="" />
                                                                            @endif
                                                                        </a>
                                                                    </div>
                                                                    <div class="utf-manage-resume-item">
                                                                        <h4>
                                                                            <a href="#"> {{ ucfirst($offreur->name)
                                                                                }}<img class="flag"
                                                                                    src="img/flags\tn.svg" alt=""
                                                                                    title="Tunisie"
                                                                                    data-tippy-placement="top" /></a>
                                                                            <span
                                                                                class="dashboard-status-button utf-status-item yellow"><i
                                                                                    class="icon-feather-user"></i>
                                                                                Offreur</span>
                                                                            @if ($recs->rstatus == 'en cours')
                                                                            <span
                                                                                class="dashboard-status-button utf-status-item green"><i
                                                                                    class="icon-material-outline-access-time"></i>
                                                                                    Claim in progress</span>
                                                                            @else
                                                                            <span
                                                                                class="dashboard-status-button utf-status-item green"><i
                                                                                    class="icon-material-outline-check-circle"></i>
                                                                                Réclamation Terminer</span>
                                                                            @endif

                                                                        </h4>

                                                                        <span class="utf-manage-resume-detail-item"><i
                                                                                class="icon-feather-phone"></i> (+216)
                                                                            {{ $offreur->phone
                                                                            }}</span>


                                                                        <div class="dashboard-task-inner-item">
                                                                            <ul class="dashboard-task-info bid-info">
                                                                                @php
                                                                                $to_date = \Carbon\Carbon::now();
                                                                                $from_date = \Carbon\Carbon::create(
                                                                                $offre->Std_close_Offre);
                                                                                $answer_in_days = $to_date->diffInDays(
                                                                                $from_date,
                                                                                false);
                                                                                @endphp
                                                                                <li><strong>{{ $offre->Mnt_offre }}
                                                                                        TND</strong></li>
                                                                                @if ( $answer_in_days < 0 ||
                                                                                    $answer_in_days==0) <li>
                                                                                    <span>Mission closed </span>
                                                        </li>
                                                        @else
                                                        <li><span>Mission closed in </span> <strong>
                                                                <?php echo e($answer_in_days) ; ?> days
                                                            </strong></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="utf-buttons-to-right ">
                                                    <div class="utf-buttons-to-right ">
                                                        <form action="{{ route('clo.rec',$recs->id) }}" method="post"
                                                            id="send-pm">
                                                            @csrf
                                                            <input type="hidden" name="rec_id" value="{{ $recs->id }}">

                                                        </form>
                                                    </div>

                                                </div>
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

                        @php
                        $userc = \App\Models\user::where('id', $recs->user_id)->first();
                        @endphp

                        <li>
                            <div class="utf-boxed-list-item-item">
                                <div class="item-content">
                                    <h4> Claim by  {{ ucfirst($user->name) }} </h4>
                                    <div class="item-details margin-top-10">
                                        <div class="utf-detail-item"><i class="icon-material-outline-date-range"></i> {{
                                            date_format($recs->created_at, 'Y M d H:i') }}</div>
                                    </div>
                                    <div class="utf-item-description">
                                        <p>
                                        <h4> <strong> Subject : </strong> {{ucfirst($recs->robject)}} </h4>
                                        <br>
                                        {{$recs->rdesc}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @foreach ($adminrecs as $item)
                        <li>
                            <div class="utf-boxed-list-item-item">
                                <div class="item-content">
                                    <h4> <strong> Adminsitrateur </strong> </h4>
                                    <div class="item-details margin-top-10">
                                        <div class="utf-detail-item"><i class="icon-material-outline-date-range"></i> {{
                                            date_format($item->created_at, 'Y M d H:i') }}</div>
                                    </div>
                                    <div class="utf-item-description">
                                        <p>
                                            {{$item->rapport}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                    @if ($recs->rstatus != 'Terminer')
                    <section id="contact" class="margin-bottom-50">
                        <div class="utf-contact-form-item">
                            <form action="{{ route('admin.rec', $recs->id) }}" method="post" name="contactform"
                                id="contactform">
                                @csrf
                                @php
                                $adminid = Auth::guard('admin')->user()->id ;
                                @endphp
                                <input type="hidden" name="rec_id" value="{{ $recs->id }}">

                                <div>
                                    <textarea class="utf-with-border" name="rapport" cols="40" rows="3" id="rapport"
                                        placeholder="Message..." required=""></textarea>
                                </div>
                                <div class="utf-centered-button margin-top-10">
                                    <button type="submit" class="submit button" id="submit" value=""> Send reply
                                    </button>
                                </div>
                            </form>
                        </div>
                    </section>
                    @endif



                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">

@endsection