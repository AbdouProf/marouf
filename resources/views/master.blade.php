<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ff8a00" />
    <meta name="description" content="Job Portal HTML Template" />
    <meta name="keywords" content="Employment, Naukri, Shine, Indeed, Job Posting, Job Provider" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Maarouf - Plateforme pour les micros services</title>
    <link rel="shortcut icon" href="img/favicon.png" />

</head>

<body>
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="utf-preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    @include('frontend.layouts.header')

    @include('frontend.layouts.banner')
    @include('frontend.layouts.categorie')

    <div class="section margin-top-60 margin-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        <span>Choisir une catégorie</span>
                        <h3>Tout un monde de personne est en besoin de toi!</h3>
                        <div class="utf-headline-display-inner-item">MA3ROUF</div>
                        <p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting industry
                            Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-4">
                    <a href="jobs-list-layout-leftside.html" class="photo-box photo-category-box small"
                        data-background-image="img/job-category-01.jpg">
                        <div class="utf-opening-position-counter-item">10 en cours</div>
                        <div class="utf-opening-box-content-part">
                            <div class="utf-category-box-icon-item"><i class="icon-line-awesome-bullhorn"></i></div>
                            <h3>A9thili</h3>
                            <span>2,612 demandes</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-4">
                    <a href="jobs-list-layout-leftside.html" class="photo-box photo-category-box small"
                        data-background-image="img/job-category-02.jpg">
                        <div class="utf-opening-position-counter-item">18 en cours</div>
                        <div class="utf-opening-box-content-part">
                            <div class="utf-category-box-icon-item"><i class="icon-line-awesome-graduation-cap"></i>
                            </div>
                            <h3>Livrili</h3>
                            <span>4,218 demandes</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-4">
                    <a href="jobs-list-layout-leftside.html" class="photo-box photo-category-box small"
                        data-background-image="img/job-category-03.jpg">
                        <div class="utf-opening-position-counter-item">25 en cours</div>
                        <div class="utf-opening-box-content-part">
                            <div class="utf-category-box-icon-item"><i class="icon-line-awesome-line-chart"></i></div>
                            <h3>Livrili</h3>
                            <span>2,186 demandes</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-4">
                    <a href="jobs-list-layout-leftside.html" class="photo-box photo-category-box small"
                        data-background-image="img/job-category-04.jpg">
                        <div class="utf-opening-position-counter-item">23 en cours</div>
                        <div class="utf-opening-box-content-part">
                            <div class="utf-category-box-icon-item"><i class="icon-line-awesome-users"></i></div>
                            <h3>Wasalni</h3>
                            <span>5,298 demandes</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-12 utf-centered-button margin-top-10">
                    <a href="jobs-categorie-two.html"
                        class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Voir toutes les
                        demandes <i class="icon-feather-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs Category Boxes / End -->
    <!-- Jobs Category Boxes / End -->
    <!-- Latest Jobs -->
    <div class="section gray padding-top-60 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        <span>Les dernières demandes</span>
                        <h3>Demandes qui pourraient vous intéresser</h3>
                        <div class="utf-headline-display-inner-item">Les dernières demandes</div>
                        <p class="utf-slogan-text">
                            Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been
                            industry standard dummy text ever since when unknown printer took a galley.
                        </p>
                    </div>
                    <div class="utf-listings-container-part compact-list-layout margin-top-35">
                        <a href="single-job-page.html" class="utf-job-listing utf-apply-button-item">
                            <div class="utf-job-listing-details">
                                <div class="utf-job-listing-company-logo">
                                    <img src="img\company_logo_1.png" alt="" />
                                </div>
                                <div class="utf-job-listing-description">
                                    <span class="dashboard-status-button utf-job-status-item green"><i
                                            class="icon-material-outline-business-center"></i> A9thili</span>
                                    <h3 class="utf-job-listing-title">
                                        N7eb 3ala 10kg degla min touzeur
                                    </h3>
                                    <div class="utf-job-listing-footer">
                                        <ul>
                                            <li>
                                                <i class="icon-material-outline-account-balance-wallet"></i>
                                                50 TND - 100 TND
                                            </li>
                                            <li><i class="icon-material-outline-location-on"></i> Sfax - Manzel Chaker
                                            </li>
                                            <li><i class="icon-material-outline-access-time"></i> 7 jours</li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="list-apply-button ripple-effect">Découvrir la demande <i
                                        class="icon-line-awesome-bullhorn"></i></span>

                            </div>
                            <span class="bookmark-icon"></span>
                        </a>
                        <a href="single-job-page.html" class="utf-job-listing utf-apply-button-item">
                            <div class="utf-job-listing-details">
                                <div class="utf-job-listing-company-logo">
                                    <img src="img\company_logo_2.png" alt="" />
                                </div>
                                <div class="utf-job-listing-description">
                                    <span class="dashboard-status-button utf-job-status-item green"><i
                                            class="icon-material-outline-business-center"></i> Livrili</span>
                                    <h3 class="utf-job-listing-title">
                                        Chkoun yejem iwasli colis il Gabes
                                        <span class="utf-verified-badge" title="Verified"
                                            data-tippy-placement="top"></span>
                                    </h3>
                                    <div class="utf-job-listing-footer">
                                        <ul>
                                            <li>
                                                <i class="icon-material-outline-account-balance-wallet"></i>
                                                30 TND - 50 TND
                                            </li>
                                            <li><i class="icon-material-outline-location-on"></i> Sfax - Route de
                                                l'aéroport</li>
                                            <li><i class="icon-material-outline-access-time"></i> 2 jours</li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="list-apply-button ripple-effect">Découvrir la demande <i
                                        class="icon-line-awesome-bullhorn"></i></span>
                            </div>
                            <span class="bookmark-icon"></span>
                        </a>
                        <a href="single-job-page.html" class="utf-job-listing utf-apply-button-item">
                            <div class="utf-job-listing-details">
                                <div class="utf-job-listing-company-logo">
                                    <img src="img\company_logo_3.png" alt="" />
                                </div>
                                <div class="utf-job-listing-description">
                                    <span class="dashboard-status-button utf-job-status-item yellow"><i
                                            class="icon-material-outline-business-center"></i> Sala7li</span>
                                    <h3 class="utf-job-listing-title">
                                        Chkoun yejem isala7li climatiseur à Sfax
                                    </h3>
                                    <div class="utf-job-listing-footer">
                                        <ul>
                                            <li>
                                                <i class="icon-material-outline-account-balance-wallet"></i>
                                                100 TND - 200 TND
                                            </li>
                                            <li><i class="icon-material-outline-location-on"></i> Sfax - Route Sokra
                                            </li>
                                            <li><i class="icon-material-outline-access-time"></i> 1 jour</li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="list-apply-button ripple-effect">Découvrir la demande <i
                                        class="icon-line-awesome-bullhorn"></i></span>
                            </div>
                            <span class="bookmark-icon"></span>
                        </a>
                        <a href="single-job-page.html" class="utf-job-listing utf-apply-button-item">
                            <div class="utf-job-listing-details">
                                <div class="utf-job-listing-company-logo">
                                    <img src="img\company_logo_4.png" alt="" />
                                </div>
                                <div class="utf-job-listing-description">
                                    <span class="dashboard-status-button utf-job-status-item green"><i
                                            class="icon-material-outline-business-center"></i> A9thili</span>
                                    <h3 class="utf-job-listing-title">
                                        Chkoun yejjem ya9thli 9athet il dar
                                        <span class="utf-verified-badge" title="Verified"
                                            data-tippy-placement="top"></span>
                                    </h3>
                                    <div class="utf-job-listing-footer">
                                        <ul>
                                            <li>
                                                <i class="icon-material-outline-account-balance-wallet"></i>
                                                150 TND - 200 TND
                                            </li>
                                            <li><i class="icon-material-outline-location-on"></i> La Soukra - Tunis</li>
                                            <li><i class="icon-material-outline-access-time"></i> 1h</li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="list-apply-button ripple-effect">Découvrir la demande <i
                                        class="icon-line-awesome-bullhorn"></i></span>
                            </div>
                            <span class="bookmark-icon"></span>
                        </a>
                        <a href="single-job-page.html" class="utf-job-listing utf-apply-button-item">
                            <div class="utf-job-listing-details">
                                <div class="utf-job-listing-company-logo">
                                    <img src="img\company_logo_5.png" alt="" />
                                </div>
                                <div class="utf-job-listing-description">
                                    <span class="dashboard-status-button utf-job-status-item green"><i
                                            class="icon-material-outline-business-center"></i> Wasalni</span>
                                    <h3 class="utf-job-listing-title">
                                        Nlawej 3ala chkoun iwasalni lil mahdia wiraj3ni
                                    </h3>
                                    <div class="utf-job-listing-footer">
                                        <ul>
                                            <li>
                                                <i class="icon-material-outline-account-balance-wallet"></i>
                                                150 TND - 200 TND
                                            </li>
                                            <li><i class="icon-material-outline-location-on"></i> Route Taniour - Sfax
                                            </li>
                                            <li><i class="icon-material-outline-access-time"></i> 1 jour</li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="list-apply-button ripple-effect">Découvrir la demande <i
                                        class="icon-line-awesome-bullhorn"></i></span>
                            </div>
                            <span class="bookmark-icon"></span>
                        </a>
                    </div>
                    <div class="utf-centered-button margin-top-10">
                        <a href="jobs-list-layout-leftside.html"
                            class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-20">Découvrir
                            toutes les demandes <i class="icon-feather-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Jobs / End -->
    <!-- Start Section Callout -->
    <div class="jbm-section-callout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-xs-12 callout-bg-1 callout-section-left pos-relative">
                    <div class="callout-bg"></div>
                    <div class="jbm-callout-in jbm-callout-in-padding pull-right">
                        <div class="jbm-section-title margin-top-80 margin-bottom-80">
                            <h2>Vous etes une personne physique</h2>
                            <span class="section-tit-line"></span>
                            <p>
                                Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been
                                industry standard dummy text ever since, when an unknown printer took a galley of type
                                and scrambled it to make
                                a type specimen book. It has survived not only five centuries.
                            </p>
                            <a href="browse-companies.html"
                                class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Voir tous
                                les avantages <i class="icon-feather-chevrons-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-xs-12 callout-bg-2 callout-section-right pos-relative">
                    <div class="callout-bg"></div>
                    <div class="jbm-callout-in jbm-callout-in-padding pull-left">
                        <div class="jbm-section-title margin-bottom-80 margin-top-80">
                            <h2>Vous étes une entreprise</h2>
                            <span class="section-tit-line"></span>
                            <p>
                                Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been
                                industry standard dummy text ever since, when an unknown printer took a galley of type
                                and scrambled it to make
                                a type specimen book. It has survived not only five centuries.
                            </p>
                            <a href="jobs-list-layout-leftside.html"
                                class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Voir tous
                                les avantages <i class="icon-feather-chevrons-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section padding-top-65 padding-bottom-75">
        <div class="container">
            <div class="col-xl-12">
                <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                    <span>Service des clients</span>
                    <h3>Besoin d'aide?</h3>
                    <div class="utf-headline-display-inner-item">Service des clients</div>
                    <p class="utf-slogan-text">
                        Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry
                        standard dummy text ever since when unknown printer took a galley.
                    </p>
                </div>
            </div>
            <div class="row need-help-area justify-content-center">
                <div class="col-xl-4">
                    <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                            <div class="utf-icon-box-circle-inner">
                                <i class="icon-brand-rocketchat"></i>
                            </div>
                        </div>
                        <h4>Envoyer un mail</h4>
                        <p>Si vous avez une question, envoyez-nous un mail.</p>
                        <a href="javascript:void(0);"
                            class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Clique ici pour
                            discuter <i class="icon-feather-chevrons-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                            <div class="utf-icon-box-circle-inner">
                                <i class="icon-feather-phone"></i>
                            </div>
                        </div>
                        <h4>Notre agent d'assistance</h4>
                        <p>Notre agent de soutien travaillera avec vous pour répondre à vos besoins de prêt.</p>
                        <a href="contact.html"
                            class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Nous contacter
                            <i class="icon-feather-chevrons-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                            <div class="utf-icon-box-circle-inner">
                                <i class="icon-brand-bimobject"></i>
                            </div>
                        </div>
                        <h4>Comment ça marche</h4>
                        <p>Visitez notre guide et en savoir plus sur nos nouvelles et nos conseils</p>
                        <a href="blog-right-sidebar.html"
                            class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Visiter notre
                            guide <i class="icon-feather-chevrons-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('frontend.layouts.subscribe')

    @include('frontend.layouts.footer')
</body>

</html>
