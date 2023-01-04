@extends('backend.layouts.master')


@section('content')
    <div class="utf-dashboard-content-inner-aera">
        <div class="notification success closeable">
            <p>Vous êtes actuellement connecté en tant que <strong>Abdou Bahloul.</strong>Votre compte a été approuvé !</p>
            <a class="close" href="#"></a>
        </div>
        <div class="utf-funfacts-container-aera">
            <div class="fun-fact" data-fun-fact-color="#2a41e8">
                <div class="fun-fact-icon"><i class="icon-feather-home"></i></div>
                <div class="fun-fact-text">
                    <h4>1502</h4>
                    <span>Demandes</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#36bd78">
                <div class="fun-fact-icon"><i class="icon-feather-briefcase"></i></div>
                <div class="fun-fact-text">
                    <h4>152</h4>
                    <span>Offres</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#efa80f">
                <div class="fun-fact-icon"><i class="icon-feather-heart"></i></div>
                <div class="fun-fact-text">
                    <h4>549</h4>
                    <span>Vues ce mois</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#0fc5bf">
                <div class="fun-fact-icon"><i class="icon-brand-telegram-plane"></i></div>
                <div class="fun-fact-text">
                    <h4>120</h4> TND
                    <span>Revnue</span>
                </div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#f02727">
                <div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
                <div class="fun-fact-text">
                    <h4>49</h4> TND
                    <span>Dépensé</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="dashboard-box main-box-in-row">
                    <div class="headline">
                        <h3>Statistiques des commandes</h3>
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
                        <h3>Liste des offres validées</h3>
                        <div class="sort-by">
                            <select class="selectpicker hide-tick">
                                <option>This Week</option>
                                <option>This Month</option>
                                <option>Last 6 Months</option>
                                <option>This Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="dashboard-list-box table-responsive invoices with-icons">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Offre</th>
                                    <th>Utilisateur</th>
                                    <th>Demande</th>
                                    <th>Date limite</th>
                                    <th>Offre</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0431261</td>
                                    <td><img alt="" class="img-fluid rounded-circle shadow-lg" src="img/thumb-1.jpeg"
                                            width="50" height="50" data-tippy-placement="top" title="John Williams"
                                            data-tippy="" /></td>
                                    <td>N7eb 5kg Degla</td>
                                    <td>12 Dec 2021</td>
                                    <td>100 TND</td>
                                    <td><span class="badge badge-pill badge-primary text-uppercase">Cloturé</span></td>
                                    <td>
                                        <a href="#" class="button gray"><i class="icon-feather-eye"></i> Affichier</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>0431261</td>
                                    <td><img alt="" class="img-fluid rounded-circle shadow-lg" src="img/thumb-1.jpeg"
                                            width="50" height="50" data-tippy-placement="top" title="John Williams"
                                            data-tippy="" /></td>
                                    <td>N7eb 5kg Degla</td>
                                    <td>12 Dec 2021</td>
                                    <td>100 TND</td>
                                    <td><span class="badge badge-pill badge-danger text-uppercase">En cours de
                                            traitement</span></td>
                                    <td>
                                        <a href="#" class="button gray"><i class="icon-feather-eye"></i> Affichier</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>0431261</td>
                                    <td><img alt="" class="img-fluid rounded-circle shadow-lg" src="img/thumb-1.jpeg"
                                            width="50" height="50" data-tippy-placement="top" title="John Williams"
                                            data-tippy="" /></td>
                                    <td>N7eb 5kg Degla</td>
                                    <td>12 Dec 2021</td>
                                    <td>100 TND</td>
                                    <td><span class="badge badge-pill badge-danger text-uppercase">En cours de
                                            cloture</span></td>
                                    <td>
                                        <a href="#" class="button gray"><i class="icon-feather-eye"></i> Affichier</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>0431261</td>
                                    <td><img alt="" class="img-fluid rounded-circle shadow-lg" src="img/thumb-1.jpeg"
                                            width="50" height="50" data-tippy-placement="top" title="John Williams"
                                            data-tippy="" /></td>
                                    <td>N7eb 5kg Degla</td>
                                    <td>12 Dec 2021</td>
                                    <td>100 TND</td>
                                    <td><span class="badge badge-pill badge-canceled text-uppercase">Annulée</span></td>
                                    <td>
                                        <a href="#" class="button gray"><i class="icon-feather-eye"></i> Affichier</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3>Mes offres envoyées</h3>
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
                        <ul class="utf-dashboard-box-list">
                            <li>
                                <div class="utf-invoice-list-item">
                                    <div class="utf-invoice-user-city">United States <img class="flag"
                                            src="img/flags\us.svg" alt="" data-tippy-placement="top" title="United States"
                                            data-tippy="" /></div>
                                    <strong>Abdou Bahloul <span class="paid">en cours de
                                            validation</span></strong>
                                    <ul>
                                        <li><span>Demande:</span> 004312641</li>
                                        <li><span>Prix:</span> 100 TND</li>
                                        <li><span>Date limite:</span> 18 Jan, 2021</li>
                                    </ul>
                                </div>
                                <div class="utf-buttons-to-right">
                                    <a href="invoice-template.html" class="button gray" title="Détails"
                                        data-tippy-placement="top">Détails</a>
                                </div>
                            </li>
                            <li>
                                <div class="utf-invoice-list-item">
                                    <div class="utf-invoice-user-city">United States <img class="flag"
                                            src="img/flags\us.svg" alt="" data-tippy-placement="top" title="United States"
                                            data-tippy="" /></div>
                                    <strong>Abdou Bahloul <span class="unpaid">Refusé</span></strong>
                                    <ul>
                                        <li><span>Demande:</span> 004312641</li>
                                        <li><span>Prix:</span> 100 TND</li>
                                        <li><span>Date limite:</span> 18 Jan, 2021</li>
                                    </ul>
                                </div>
                                <div class="utf-buttons-to-right">
                                    <a href="invoice-template.html" class="button gray" title="Détails"
                                        data-tippy-placement="top">Détails</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="utf-pagination-container-aera margin-top-10 margin-bottom-50">
                    <nav class="pagination">
                        <ul>
                            <li class="utf-pagination-arrow">
                                <a href="#" class="ripple-effect"><i
                                        class="icon-material-outline-keyboard-arrow-left"></i></a>
                            </li>
                            <li><a href="#" class="current-page ripple-effect">1</a></li>
                            <li><a href="#" class="ripple-effect">2</a></li>
                            <li><a href="#" class="ripple-effect">3</a></li>
                            <li class="utf-pagination-arrow">
                                <a href="#" class="ripple-effect"><i
                                        class="icon-material-outline-keyboard-arrow-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3>Liste des offres reçues</h3>
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
                        <ul class="utf-dashboard-box-list">
                            <li>
                                <div class="utf-invoice-list-item">
                                    <div class="utf-invoice-user-city">United States <img class="flag"
                                            src="img/flags\us.svg" alt="" data-tippy-placement="top" title="United States"
                                            data-tippy="" /></div>
                                    <strong>Ali ben hssan <span class="paid">en cours de
                                            validation</span></strong>
                                    <ul>
                                        <li><span>Demande:</span> 004312641</li>
                                        <li><span>Prix:</span> 100 TND</li>
                                        <li><span>Date limite:</span> 18 Jan, 2021</li>
                                    </ul>
                                </div>
                                <div class="utf-buttons-to-right">
                                    <a href="invoice-template.html" class="button gray" title="Détails"
                                        data-tippy-placement="top"><i class="icon-feather-printer"></i> Détails</a>
                                </div>
                            </li>
                            <li>
                                <div class="utf-invoice-list-item">
                                    <div class="utf-invoice-user-city">United States <img class="flag"
                                            src="img/flags\us.svg" alt="" data-tippy-placement="top" title="United States"
                                            data-tippy="" /></div>
                                    <strong>Mariem Turki <span class="unpaid">Refusé</span></strong>
                                    <ul>
                                        <li><span>Demande:</span> 004312641</li>
                                        <li><span>Prix:</span> 100 TND</li>
                                        <li><span>Date limite:</span> 18 Jan, 2021</li>
                                    </ul>
                                </div>
                                <div class="utf-buttons-to-right">
                                    <a href="invoice-template.html" class="button gray" title="Détails"
                                        data-tippy-placement="top"><i class="icon-feather-printer"></i> Détails</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="utf-pagination-container-aera margin-top-10 margin-bottom-50">
                    <nav class="pagination">
                        <ul>
                            <li class="utf-pagination-arrow">
                                <a href="#" class="ripple-effect"><i
                                        class="icon-material-outline-keyboard-arrow-left"></i></a>
                            </li>
                            <li><a href="#" class="current-page ripple-effect">1</a></li>
                            <li><a href="#" class="ripple-effect">2</a></li>
                            <li><a href="#" class="ripple-effect">3</a></li>
                            <li class="utf-pagination-arrow">
                                <a href="#" class="ripple-effect"><i
                                        class="icon-material-outline-keyboard-arrow-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Wrapper / End -->
        <!-- Leave a Review for Freelancer Popup -->
        <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
            <div class="utf-signin-form-part">
                <ul class="utf-popup-tabs-nav-item">
                    <li class="modal-title">User Add Notes</li>
                </ul>
                <div class="utf-popup-container-part-tabs">
                    <div class="utf-popup-tab-content-item" id="tab2">
                        <form method="post" id="leave-review-form">
                            <textarea class="utf-with-border" placeholder="Add Notes" name="message2" id="message2" cols="7"
                                required=""></textarea>
                        </form>
                        <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit"
                            form="leave-review-form">Submit Your Note <i class="icon-feather-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="js/chart.min.js"></script>
        <script>
            Chart.defaults.global.defaultFontFamily = "Nunito";
            var config = {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "View User",
                        backgroundColor: "rgba(255,138,0,0.08)",
                        borderColor: "#ff8a00",
                        borderWidth: "3",
                        data: [799, 630, 636, 644, 722, 680, 799, 722, 836, 644, 722, 780],
                        pointRadius: 4,
                        titleFontSize: 18,
                        pointHoverRadius: 4,
                        pointHitRadius: 10,
                        pointBackgroundColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointBorderWidth: "3",
                    }, ],
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

                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    },

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
            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myLine = new Chart(ctx, config);
            };
        </script>
    @endsection
