@extends('frontend.layouts.master')

@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Chercher une mission</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="index-1.html">Accueil</a></li>
                            <li>Liste des demandes</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Titlebar End -->

    <!-- Search Jobs Start -->
    <div class="inner_search_block_section padding-top-0 padding-bottom-40">
        <div class="container">
            <div class="col-md-12">
                <div class="utf-intro-banner-search-form-block">
                    <div class="utf-intro-search-field-item">
                        <i class="icon-feather-search"></i>
                        <input id="intro-keywords" type="text" placeholder="Chercher une mission">
                    </div>
                    <div class="utf-intro-search-field-item">
                        <select class="selectpicker default" data-live-search="true" data-selected-text-format="count"
                            data-size="5" title="Choisir une région">
                            <option>Tunis</option>
                            <option>Sfax</option>
                            <option>Sousse</option>
                            <option>Mestire</option>
                            <option>Gabes</option>
                        </select>
                    </div>
                    <div class="utf-intro-search-button">
                        <button class="button ripple-effect"
                            onclick="window.location.href='jobs-list-layout-leftside.html'"><i
                                class="icon-material-outline-search"></i> Chercher</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Jobs End -->

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="utf-sidebar-container-aera">
                    <div class="utf-sidebar-widget-item">
                        <div class="utf-quote-box utf-jobs-listing-utf-quote-box">
                            <div class="utf-quote-info">
                                <h4>Faites la différence avec Ma3rouf</h4>
                                <p>Ceci est un bloque publicitaire, merci de nous contacter</p>
                                <a href="register.html"
                                    class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Contactez-nous
                                    <i class="icon-feather-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="utf-sidebar-widget-item">
                        <h3>Taper une mot clé</h3>
                        <form action="{{route('search')}}" method="GET">
                        
                            <div class="utf-input-with-icon">
                                <input type="text" name="query" placeholder="Mot clé..."
                                     >
                                <i class="icon-material-outline-search"></i>
                            </div>
                    </div>

                    <div class="utf-sidebar-widget-item">
                        <h3>Budget de la mission</h3>
                        <div class="margin-top-55"></div>
                        <input class="range-slider" type="text" value="" data-slider-currency="TND" data-slider-min="1"
                            data-slider-max="1000" data-slider-step="1" data-slider-value="[1,1000]">
                    </div>

                    <div class="utf-sidebar-widget-item">
                        <h3>Catégorie</h3>
                        <div class="utf-radio-btn-list">
                            @if (!empty($_GET['category']))
                                @php
                                    $filter_cats = explode(',', $_GET['category']);
                                @endphp
                            @endif

                            @foreach ($cats as $cat)
                                <div class="checkbox">

                                    <input type="checkbox" @if (!empty($filter_cats) && in_array($cat->title, $filter_cats)) checked @endif
                                        class="custom-control-input" id="{{ $cat->title }}" name="category[]"
                                        onchange="this.form.submit();" value="{{ $cat->title }}">
                                    <label class="custom-control-label" for="{{ $cat->title }}"><span
                                            class="checkbox-icon"></span>{{ ucfirst($cat->title) }}</label>
                                </div>
                            @endforeach


                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="utf-sidebar-widget-item">
                        <h3>Duré de la mission</h3>
                        <div class="utf-radio-btn-list">
                            <div class="checkbox">
                                <input type="checkbox" id="chekcbox01" checked="">
                                <label for="chekcbox01"><span class="checkbox-icon"></span> Moins de 1h</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="chekcbox02">
                                <label for="chekcbox02"><span class="checkbox-icon"></span> Moins de 12h</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="chekcbox03">
                                <label for="chekcbox03"><span class="checkbox-icon"></span> Moins de 24h</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="chekcbox04">
                                <label for="chekcbox04"><span class="checkbox-icon"></span> Moins de 1 semaine</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="chekcbox04">
                                <label for="chekcbox04"><span class="checkbox-icon"></span> Plus que 1 semaine</label>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="utf-sidebar-widget-item">
                        <h3>Pays</h3>
                        <div class="utf-radio-btn-list">

                            @if (!empty($_GET['country']))
                                @php
                                    $filter_country = explode(',', $_GET['country']);
                                @endphp
                            @endif

                            @foreach ($countrys as $country)
                                <div class="checkbox">

                                    <input type="checkbox" @if (!empty($filter_country) && in_array($country->name, $filter_country)) checked @endif
                                        class="custom-control-input" id="{{ $country->name }}" name="country[]"
                                        onchange="this.form.submit();" value="{{ $country->name }}">
                                    <label class="custom-control-label" for="{{ $country->name }}"><span
                                            class="checkbox-icon"></span>{{ ucfirst($country->name) }}</label>
                                </div>
                            @endforeach



                            <div class="checkbox">
                                <input type="checkbox" id="chekcbox003">
                                <label for="chekcbox003"><span class="checkbox-icon"></span> Sousse</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="chekcbox004">
                                <label for="chekcbox004"><span class="checkbox-icon"></span> Gabes</label>
                            </div>
                        </div>
                    </div>
                    <div class="utf-sidebar-widget-item">
                        <button type="submit" style="..." class="button ripple-effect utf-button-sliding-icon">Search<i class="icon-material-outline-search"></i></button>
                    </div>
                    
                    </form>

                    <div class="utf-sidebar-widget-item">
                        <div class="utf-detail-banner-add-section">
                            <a href="#"><img src="img/banner-add-2.jpeg" alt="banner-add-2"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8">
                <div class="utf-inner-search-section-title">
                    <h4><i class="icon-material-outline-search"></i> Résultat de recherche des demandes</h4>
                </div>
                <div class="utf-notify-box-aera margin-top-15">
                    <div class="utf-switch-container-item">
                        <span>Afficher 1–10 sur 50 demandes :</span>
                    </div>
                    <div class="sort-by">
                        <span>Trier par:</span>
                        <select class="selectpicker hide-tick">
                            <option>A vers Z</option>
                            <option>Nouveau</option>
                            <option>Ancien</option>
                        </select>
                    </div>
                </div>


                <div class="utf-listings-container-part compact-list-layout margin-top-35">
                    @foreach ($demandes as $item)
                        <a href="{{ route('demande.detail', $item->title) }}"
                            class="utf-job-listing utf-apply-button-item">
                            <div class="utf-job-listing-details">
                                <div class="utf-job-listing-company-logo">
                                    <img src="img/company_logo_1.png" alt="" />
                                </div>
                                <div class="utf-job-listing-description">
                                    @php
                                        $demande = \App\Models\Demande::where('id', $item->id)->first();
                                    @endphp
                                    @if ($item->cat_id == 1)
                                        <span class="dashboard-status-button green"><i class="icofont-shopping-cart"></i>
                                            {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                    @elseif($item->cat_id == 4)
                                        <span class="dashboard-status-button yellow"><i class="icofont-auto-mobile"></i>
                                            {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                    @else
                                        <span class="dashboard-status-button red"><i class="icofont-fast-delivery"></i>
                                            {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                                    @endif
                                    <h3 class="utf-job-listing-title">
                                        {{ $item->title }}
                                    </h3>
                                    <div class="utf-job-listing-footer">
                                        <ul>
                                            <li>
                                                <i class="icon-material-outline-account-balance-wallet"></i>
                                                {{ $item->Bmin }} TND - {{ $item->Bmax }} TND
                                            </li>
                                            <li><i class="icon-material-outline-location-on"></i> Sfax - Manzel Chaker</li>
                                            @php
                                            $to_date = \Carbon\Carbon::create($item->created_at);        
                                            $from_date = \Carbon\Carbon::create( $item->Std_close);
                                            $answer_in_days = $to_date->diffInDays($from_date);
                                            
                                            @endphp
                                            <li><i class="icon-material-outline-access-time" ></i> <?php echo e($answer_in_days); ?>  jours</li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="list-apply-button ripple-effect">Découvrir la demande <i
                                        class="icon-line-awesome-bullhorn"></i></span>
                            </div>
                            <span class="bookmark-icon add_to_wishlist" data-id="{{ $item->id }}"
                                id="add_to_wishlist_{{ $item->id }}"> </span>
                        </a>
                    @endforeach


                </div>
                
               

                <!-- Pagination -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="utf-pagination-container-aera margin-top-30 margin-bottom-60">
                            <nav class="pagination">
                                {{$demandes->appends($_GET)->links('vendor.pagination.custom')}}

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/custom_jquery.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        {{-- Add to wishlist --}}
        <script>
            $.noConflict();
            $(document).on('click', '.add_to_wishlist', function(e) {
                e.preventDefault();
                var demande_id = $(this).data('id');

                var token = "{{ csrf_token() }}";
                var path = "{{ route('wishlist.store') }}";

                console.log('++++++++++++')

                console.log(token)

                $.ajax({
                    url: path,
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        demande_id: demande_id,
                        _token: token,
                    },

                    success: function(data) {
                        console.log(data);
                        if (data['status']) {
                            $('body #header-ajax').html(data['header']);
                            $('body #wishlist_counter').html(data['wishlist_count']);
                            swal({
                                title: "Good job",
                                text: data['message'],
                                icon: "success",
                                button: "OK!",
                            });
                        } else if (data['present']) {
                            $('body #header-ajax').html(data['header']);
                            $('body #wishlist_counter').html(data['wishlist_count']);
                            swal({
                                title: "Opps!",
                                text: data['message'],
                                icon: "warning",
                                button: "OK!",
                            });
                        } else {
                            swal({
                                title: "Sorry!",
                                text: "Ypu can add that product",
                                icon: "error",
                                button: "OK!",
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });

            });
        </script>
    @endsection
