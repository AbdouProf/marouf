@extends('backend.layouts.master')

@section('content')


<!-- Dashboard Content -->
<div class="utf-dashboard-content-container-aera" data-simplebar="">
    <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
        <div class="row">
            <div class="col-xl-12">
                <h3>Dashboard</h3>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index-1.html">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="utf-dashboard-content-inner-aera">
        <div class="notification success closeable">
            <p> You are Currently Signed in as <strong>{{ auth()->user()->name}}</strong>!</p>
            <a class="close" href="#"></a>
        </div>
        <div class="utf-funfacts-container-aera">
            <div class="fun-fact" data-fun-fact-color="#2a41e8">
                <div class="fun-fact-icon"><i class="icon-material-outline-file-copy"></i></div>
                <div class="fun-fact-text">
                    <h4>{{ count($demandes) }}</h4>
                    <span>Requests</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#36bd78">
                <div class="fun-fact-icon"><i class="icon-material-outline-local-offer"></i></div>
                <div class="fun-fact-text">
                    @php
                    $offresu=\App\Models\Offre::where('user_id',auth()->user()->id)->get();
                    @endphp
                    <h4>{{ count($offresu) }}</h4>
                    <span>Offers</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#0fc5bf">
                <div class="fun-fact-icon"><i class="icon-line-awesome-money"></i></div>
                <div class="fun-fact-text">
                    <h4>{{ \App\Models\user::where('id', auth()->user()->id)->sum('solde') }}</h4> TND
                    <span>Balance</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#efa80f">
                <div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
                @php
                $Offre = \App\Models\Offre::where(['user_id'=>auth()->user()->id,'ostatus'=>'Offre Accepte'])->sum('Mnt_offre') ;
                @endphp
                <div class="fun-fact-text">
                    <h4>{{ $Offre }}</h4> TND
                    <span>Amount spent</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#f02727">
                <div class="fun-fact-icon"><i class="icon-line-awesome-dollar"></i></div>
                @php
                $paiement = \App\Models\Paiement::where(['user_id'=>auth()->user()->id,'p_status'=>1])->sum('p_mnt') ;
                @endphp
                <div class="fun-fact-text">
                    <h4>{{ $paiement }}</h4> TND
                    <span>Amount paid</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="dashboard-box main-box-in-row">
                    <div class="headline">
                        <h3>Statistics</h3>

                    </div>
                    <div class="content">
                        <div class="chart">
                            <canvas id="canvas" width="80" height="20"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="utf_dashboard_list_box table-responsive recent_booking dashboard-box">
                    <div class="headline">
                        <h3>List of the validated offers</h3>

                    </div>
                    <div class="dashboard-list-box table-responsive invoices with-icons">
                        <table class="table table-hover">
                            <thead>
                                <tr style="text-align:center;">

                                    <th>ID Offre</th>
                                    <th>Category</th>
                                    <th>Request</th>
                                    <th>Deadline</th>
                                    <th>Offer</th>
                                    <th>Status</th>
                                    <th>See Request</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ( count ($offres) > 0 )
                                @foreach ($offres as $item)
                                @php
                                $user = App\Models\User::where('id', $item->user_id)->first();
                                $demande = App\Models\Demande::where('id', $item->demande_id)->first();
                                $cat = App\Models\Category::where('id', $demande->cat_id)->first();
                                @endphp
                                <tr style="text-align:center;">

                                    <td>{{ $item->offre_number }}</td>
                                    <td>{{ $cat->title}}  </td>
                                    <td>{{ $demande->title }}</td>
                                    <td> {{ date_format($item->created_at, 'Y-M-d') }}</td>
                                    <td>{{ $item->Mnt_offre }} TND</td>

                                    @if ($item->StatusOffreAccepter == 'Offre cloturer')
                                    <td><span class="badge badge-pill badge-primary text-uppercase">Closed</span></td>
                                    @elseif ($item->StatusOffreAccepter == 'Offre en cours')
                                    <td><span class="badge badge-pill badge-danger text-uppercase">In progress</span></td>
                                    @else
                                    <td><span class="badge badge-pill badge-canceled text-uppercase">Cancel</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('demande.detail', $demande->title) }}"  class="button gray"><i class="icon-feather-eye"></i> View detail </a>
                                    </td>
                                </tr>
                                @endforeach
                            @else 
                            <td colspan="7" style="text-align:center;"> You don't have any offers</td>
                            @endif



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- Dashboard Content End -->
@endsection


@section('scripts')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">

<script src="js\chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>



<script>
    Chart.defaults.global.defaultFontFamily = "Nunito";
    var demandes =  <?php echo json_encode($datas) ?> ;

    var config = {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Number of requests",
                    backgroundColor: "rgba(255,138,0,0.08)",
                    borderColor: "#ff8a00",
                    borderWidth: "3",
                    data: demandes,
                    pointRadius: 4,
                    titleFontSize: 18,
                    pointHoverRadius: 4,
                    pointHitRadius: 10,
                    pointBackgroundColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointBorderWidth: "3",
                },
            ],
        },
        options: {
            responsive: true,
            tooltips: {
                backgroundColor: "#333",
                titleFontSize: 15,
                titleFontColor: "#fff",
                bodyFontColor: "#fff",
                bodyFontSize: 13,
                displayColors: false,
                xPadding: 10,
                yPadding: 10,
                intersect: false,
            },

            legend: { display: false },
            title: { display: false },

            scales: {
                x: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: "Month",
                    },
                   
                },
                y: {
                    type: "demande",
                    position: "left",
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: "Request State",
                    },
                    reverse: true,
                },
            },
        },
    };
    window.onload = function () {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx, config);
    };
</script>

@endsection