@extends('frontend.layouts.master')

@section('content')
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>List of requests</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index-1.html">Home</a></li>
                        <li>List of requests</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Titlebar End -->

<!-- Search Jobs Start 
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
</div> -->
<!-- Search Jobs End -->

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="utf-sidebar-container-aera">
                <div class="utf-sidebar-widget-item">
                    <div class="utf-quote-box utf-jobs-listing-utf-quote-box">
                        <div class="utf-quote-info">
                            <h4>Make the difference with  <strong> Maarouf </strong> </h4>
                            <p>This is an advertising block, thank you for contacting us</p>
                            <a href="{{route('contact.us')}}"
                                class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Contact Us
                                <i class="icon-feather-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="utf-sidebar-widget-item">
                    <h3>Type a keyword</h3>
                    <form action="{{route('search')}}" method="GET">

                        <div class="utf-input-with-icon">
                            <input type="text" name="query" placeholder="keyword..." @if(!empty($_GET['query']))  value="<?php echo $_GET['query']; ?>" @endif>
                            <i class="icon-material-outline-search"></i>
                        </div>
                </div>

                <div class="utf-sidebar-widget-item">
                    <h3>Budget of the mission</h3>
                    <div class="margin-top-55"></div>

                    @if(!empty($_GET['slide']))
                    @php
                        $pieces=explode(',',$_GET['slide']);
                    @endphp
                     @endif

                    <input id="slider-range" class="range-slider" type="text" value="" data-slider-currency="TND"
                        data-slider-min="1" data-slider-max="1000" data-slider-step="1" @if(!empty($_GET['slide'])) data-slider-value="[<?php echo $pieces[0] ?>,<?php echo $pieces[1] ?>]" @else  data-slider-value="[1,1000]"  @endif
                        onchange="updateTextInput(this.value);">

                    <input type="hidden" id="slide" name="slide" value="">


                </div>

                <div class="utf-sidebar-widget-item">
                    <h3>Category</h3>
                    <div class="utf-radio-btn-list">


                        @foreach ($cats as $cat)
                        <div class="checkbox">

                            

                            <input type="checkbox" @if (!empty($_GET['category']) && in_array($cat->title, ($_GET['category'])))
                            checked @endif
                            class="custom-control-input" id="{{ $cat->title }}" name="category[]"
                            value="{{ $cat->title }}">
                            <label class="custom-control-label" for="{{ $cat->title }}"><span
                                    class="checkbox-icon"></span>{{ ucfirst($cat->title) }}</label>
                        </div>
                        @endforeach


                    </div>
                </div>

                <div class="clearfix"></div>


                <div class="utf-sidebar-widget-item">
                    <h3>Country</h3>
                    <div class="utf-radio-btn-list">


                        @foreach ($countrys as $country)
                        <div class="checkbox">

                            <input type="checkbox"  @if (!empty($_GET['country']) && in_array($country->name, ($_GET['country'])))
                            checked @endif
                            class="custom-control-input" id="{{ $country->name }}" name="country[]"
                            value="{{ $country->name }}">
                            <label class="custom-control-label" for="{{ $country->name }}"><span
                                    class="checkbox-icon"></span>{{ ucfirst($country->name) }}</label>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="clearfix"></div>
                @php
                $statesT = App\Models\State::where('country_id', 1)->get();
                @endphp

                <div class="utf-sidebar-widget-item d-none" id="showDiv">
                    <h3>City of Tunisie</h3>
                    <div class="utf-radio-btn-list">
                        @foreach ($statesT as $state)
                        <div class="checkbox">
                            <input type="checkbox" @if (!empty($_GET['state']) && in_array($state->name, ($_GET['state'])))
                            checked @endif
                            class="custom-control-input" id="{{ $state->name }}" name="state[]"
                            value="{{ $state->name }}">
                            <label class="custom-control-label" for="{{ $state->name }}"><span
                                    class="checkbox-icon"></span>{{ ucfirst($state->name) }}</label>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="clearfix"></div>
                @php
                $statesF = App\Models\State::where('country_id', 2)->get();
                @endphp

                <div class="utf-sidebar-widget-item d-none" id="sshowDiv">
                    <h3>City of France</h3>
                    <div class="utf-radio-btn-list">
                        @foreach ($statesF as $state)
                        <div class="checkbox">
                            <input type="checkbox" @if (!empty($_GET['state']) && in_array($state->name, ($_GET['state'])))
                            checked @endif
                            class="custom-control-input" id="{{ $state->name }}" name="state[]"
                            value="{{ $state->name }}">
                            <label class="custom-control-label" for="{{ $state->name }}"><span
                                    class="checkbox-icon"></span>{{ ucfirst($state->name) }}</label>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="utf-sidebar-widget-item">
                    <button type="submit" style="..." class="button ripple-effect utf-button-sliding-icon mm"> Search <i
                            class="icon-material-outline-search"></i></button>
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
                <h4><i class="icon-material-outline-search"></i> Search result of the requests</h4>
            </div>
            <form action="{{route('Trier.Filter')}}" method="GET">

                <div class="utf-notify-box-aera margin-top-15">
                    <div class="utf-switch-container-item">
                        <span>Showing 1–10 on {{ $demandes->count() }} requests :</span>
                    </div>

                    <div class="sort-by">
                        <span>Sort by:</span>
                        <select id="sortBy" name="sortBy" onchange="this.form.submit();" class="selectpicker hide-tick">
                            <option value="new" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='new' ) selected @endif>
                                New</option>
                            <option value="old" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='old' ) selected @endif>
                                Old</option>
                        </select>
                    </div>

                </div>
            </form>



            <div class="utf-listings-container-part compact-list-layout margin-top-35">
                @foreach ($demandes as $item)
                @php
                $to_date = \Carbon\Carbon::now();
                $from_date = \Carbon\Carbon::create( $item->Std_close);
                $answer_in_days = $to_date->diffInDays($from_date, false);

                @endphp
                @if ( $answer_in_days > 0 )
                <a href="{{ route('demande.detail', $item->title) }}" class="utf-job-listing utf-apply-button-item">
                    <div class="utf-job-listing-details">
                        <div class="utf-job-listing-company-logo">
                            @if ($item->cat_id == 1)

                            <div class="utf-category-box-icon-item"><i class="icon-feather-shopping-bag1"></i></div>
                            @elseif ($item->cat_id == 2)
                            <div class="utf-category-box-icon-item"><i class="icon-feather-package1"></i></div>

                            @else
                            <div class="utf-category-box-icon-item"><i class="icon-material-outline-directions-car1"></i></div>

                            @endif


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
                                    <li><i class="icon-material-outline-location-on"></i> {{$item->Dadress}} -{{
                                        \App\Models\State::where('id', $item->state_id)->value('name') }}</li>

                                    <li><i class="icon-material-outline-access-time"></i>
                                        <?php echo e($answer_in_days); ?> days
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span class="list-apply-button ripple-effect"> Discover the request <i
                                class="icon-line-awesome-bullhorn"></i></span>
                    </div>
                    <span class="bookmark-icon add_to_wishlist" data-id="{{ $item->id }}"
                        id="add_to_wishlist_{{ $item->id }}"> </span>
                </a>
                @endif
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
</div>
@endsection

@section('scripts')
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/custom_jquery.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




<script>
    $('#Tunisie').change(function(e)
    {
        e.preventDefault();
        var is_checked=$('#Tunisie').prop('checked');
        if(is_checked)
        {
            $('#showDiv').removeClass('d-none'); 

        }else{
            $('#showDiv').addClass('d-none');
        }
    });
</script>

<script>
    $('#France').change(function(e)
    {
        e.preventDefault();
        var is_checked=$('#France').prop('checked');
        if(is_checked)
        {
            $('#sshowDiv').removeClass('d-none'); 

        }else{
            $('#sshowDiv').addClass('d-none');
        }
    });
</script>




<script>
    function updateTextInput(val) {
          document.getElementById('slide').value=val; 
        }

</script>

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