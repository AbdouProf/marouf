@extends('admin.layouts.master')

@section('content')
<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
    <div class="row">
        <div class="col-xl-12">
            <h3>Dashboard</h3>
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="index-1.html">Home</a></li>
                    <li><a href="dashboard.html">Dashboard</a></li>
                   
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Dashboard Content -->
<div class="utf-dashboard-content-container-aera" data-simplebar="">
   
    <div class="utf-dashboard-content-inner-aera">
        <div class="notification success closeable">
            <p>You are Currently Signed in as <strong>ADMIN.</strong>!</p>
            <a class="close" href="#"></a>
        </div>
        <div class="utf-funfacts-container-aera">
            <div class="fun-fact" data-fun-fact-color="#2a41e8">
                <div class="fun-fact-icon"><i class="icon-material-outline-file-copy"></i></div>
                <div class="fun-fact-text">
                    <h4>{{ \App\Models\demande::count() }}</h4>
                    <span>Requests</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#36bd78">
                <div class="fun-fact-icon"><i class="icon-material-outline-local-offer"></i></div>
                <div class="fun-fact-text">
                    <h4>{{ \App\Models\offre::count() }}</h4>
                    <span>Offers</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#efa80f">
                <div class="fun-fact-icon"><i class="icon-material-outline-money"></i></div>
                <div class="fun-fact-text">
                    <h4>{{ (\App\Models\Offre::where('ostatus','Offre Accepte')->sum('Mnt_offre')*0.05) + (\App\Models\Paiement::where('p_status',1)->sum('p_mnt') *0.05) }}</h4> TND
                    <span>Commission</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#0fc5bf">
                <div class="fun-fact-icon"><i class="icon-line-awesome-money"></i></div>
                <div class="fun-fact-text">
                    <h4>{{ \App\Models\Offre::where('ostatus','Offre Accepte')->sum('Mnt_offre') }}</h4> TND
                    <span>Revenue</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#f02727">
                <div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
                <div class="fun-fact-text">
                    <h4>{{ \App\Models\Paiement::where('p_status',1)->sum('p_mnt') }}</h4> TND
                    <span>Spent</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="dashboard-box main-box-in-row">
                    <div class="headline">
                        <h3>Statistiques des demandes</h3>
                        <div class="sort-by">
                            <select class="selectpicker hide-tick">
                                <option>This Week</option>
                                <option>This Month</option>
                                <option>Last 6 Months</option>
                                <option>This Year</option>
                            </select>
                        </div>
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
                        <h3>List of validated offers</h3>
                    
                    </div>
                    <div class="dashboard-list-box table-responsive invoices with-icons">
                        <table class="table table-hover">
                            <thead>
                                <tr style="text-align:center;">
                                    <th>ID Offre</th>
                                    <th>Utilisateur</th>
                                    <th>Demande</th>
                                    <th>Deadline</th>
                                    <th>Offer</th>
                                    <th>Status</th>
                                    <th>See Request</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offres as $item)
                                @php
                                $user = App\Models\User::where('id', $item->user_id)->first();
                                $demande = App\Models\Demande::where('id', $item->demande_id)->first();
                                @endphp
                                <tr style="text-align:center;">
                                    <td>{{ $item->offre_number }}</td>
                                    <td><img alt="" class="img-fluid rounded-circle shadow-lg" src="/{{ $user->image }}" width="50" height="50" data-tippy-placement="top" title="{{ ucfirst($user->name) }}" data-tippy="" /></td>
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
                                        <a href="{{ route('demande.detail', $demande->title) }}" class="button gray"><i class="icon-feather-eye"></i> View</a>
                                    </td>
                                </tr>
                                @endforeach
                              
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
<script src="js\chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">




<script>
    Chart.defaults.global.defaultFontFamily = "Nunito";
    var demandes =  <?php echo json_encode($demandes) ?> ;

    var config = {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Nombre demandes",
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
                    type: "category",
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