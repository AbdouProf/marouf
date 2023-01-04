@extends('frontend.layouts.script')


@section('content')
    <!-- Preloader Start -->

    <div class="clearfix"></div>


    <!-- Titlebar -->
    <div class="single-page-header" data-background-image="img/single-company.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="utf-single-page-header-inner-aera">
                        <div class="utf-left-side">
                            @php
                                $image = explode(',', $user->image);
                            @endphp
                            <div class="utf-header-image"><img src="{{ $image[0] }}" alt=""></div>
                            <div class="utf-header-details">
                                <ul>
                                    <li> {{ $user->name }} , <b> Germany </b> <img class="flag"
                                            src="img/flags/de.svg" alt="" title="Afghanistan" data-tippy-placement="top">
                                    </li>
                                </ul>
                                <h3>{{ ucfirst($demande->title) }} <span class="utf-verified-badge" title="Verified"
                                        data-tippy-placement="top"></span></h3>
                                <h5><i class="icon-material-outline-business-center"></i> A9thili</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 utf-content-right-offset-aera">
                <!-- Description -->
                <div class="utf-single-page-section-aera">
                    <div class="utf-boxed-list-headline-item">
                        <h3><i class="icon-feather-info"></i> A propos la mission</h3>
                    </div>
                    <img src="https://i2.wp.com/lapresse.tn/wp-content/uploads/2019/05/Degla.png?fit=850%2C491&ssl=1"
                        style=" padding: 0 20px 10px 20px; ">
                    <p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry
                        standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to
                        make a type specimen book. It has survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                        release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                        publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                </div>
                <div class="utf-single-page-section-aera">
                    <div class="utf-boxed-list-headline-item">
                        <h3><i class="icon-material-outline-location-on"></i> Jobs Location</h3>
                    </div>
                    <div id="utf-single-job-map-container-item">
                        <div id="singleListingMap" data-latitude="48.8566" data-longitude="2.3522"
                            data-map-icon="im im-icon-Hamburger"></div>
                    </div>
                </div>
                <!-- Atachments -->
                <div class="utf-single-page-section-aera">
                    <div class="utf-boxed-list-headline-item">
                        <h3><i class="icon-feather-briefcase"></i> Fichiers assiciés à cette mission</h3>
                    </div>
                    <div class="attachments-container">
                        <a href="#" class="attachment-box ripple-effect"><span>Project Brief</span><i>Letter PDF
                                Files</i></a>
                        <a href="#" class="attachment-box ripple-effect"><span>Project Document</span><i>Letter PDF
                                Files</i></a>
                        <a href="#" class="attachment-box ripple-effect"><span>Project Contact</span><i>Letter DOCX
                                Files</i></a>
                    </div>
                </div>
                <div class="utf-detail-social-sharing margin-top-10">
                    <div class="utf-boxed-list-headline-item">
                        <h3><i class="icon-feather-share-2"></i> Partager cette mission sur les réseaux sociaux</h3>
                    </div>
                    <ul class="margin-top-15">
                        <li><a href="#" title="Facebook" data-tippy-placement="top"><i
                                    class="icon-brand-facebook-f"></i></a></li>
                        <li><a href="#" title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a>
                        </li>
                        <li><a href="#" title="LinkedIn" data-tippy-placement="top"><i
                                    class="icon-brand-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="utf-sidebar-container-aera">
                    <div class="bidding-countdown margin-bottom-30"
                        title="Project has been verified and belongs business owner or manager." data-tippy-placement="top">
                        Il reste 2j, 30min</div>

                    <div class="utf-sidebar-widget-item">
                        <h3>Budget estimatif de la mission</h3>
                        <div class="utf-right-side">
                            <div class="salary-box">
                                <div class="salary-amount">100 TND - 200 TND</div>
                            </div>
                        </div>
                    </div>

                    <div class="utf-sidebar-widget-item">
                        <div class="bidding-widget">
                            <div class="utf-bidding-overview-headline">Envoyer une proposition</div>
                            <div class="bidding-inner">
                                <span class="bidding-detail">Merci de définir votre offre de prix pour cette
                                    mission</strong></span>
                                <div class="bidding-value">$<span id="biddingVal"></span></div>
                                <input class="bidding-slider" type="text" value="" data-slider-handle="custom"
                                    data-slider-currency="TND" data-slider-min="0" data-slider-max="1000"
                                    data-slider-value="1" data-slider-step="1" data-slider-tooltip="hide">
                                <span class="bidding-detail margin-top-30"><strong>Vous clôturerez le projet
                                        dans:</strong></span>
                                <div class="bidding-fields">
                                    <div class="bidding-field">
                                        <div class="qtyButtons">
                                            <div class="qtyDec"></div>
                                            <input type="text" name="qtyInput" value="1">
                                            <div class="qtyInc"></div>
                                        </div>
                                    </div>
                                    <div class="bidding-field">
                                        <select class="selectpicker default">
                                            <option selected="">Jours</option>
                                            <option>Heurs</option>
                                            <option>Mois</option>
                                        </select>
                                    </div>
                                </div>
                                <button id="snackbar-place-bid"
                                    class="button ripple-effect move-on-hover full-width margin-top-25"><span>Envoyer</span></button>
                            </div>
                        </div>
                    </div>

                    <div class="utf-sidebar-widget-item">
                        <div class="utf-detail-banner-add-section">
                            <a href="#"><img src="img/banner-add-2.jpeg" alt="banner-add-2"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Google API & Maps -->
    <!-- Geting an API Key: https://developers.google.com/maps/documentation/javascript/get-api-key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>
    <script src="js/infobox.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap-grid.css" />
    <script src="js/markerclusterer.js"></script>


    <script src="js/maps.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>
    <script src="js/custom_jquery.js"></script>
@endsection
