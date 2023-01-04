@extends('backend.layouts.master')


@section('content')
<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
    <div class="row">
        <div class="col-xl-12">
            <h3>Add a new request</h3>
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="index-1.html">Home</a></li>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <li>Add a new request</li>
                </ul>
            </nav>
        </div>
    </div>
</div>

    <form action="{{ route('demande.store') }}" method="post">
        @csrf
        <div class="utf-dashboard-content-inner-aera">
            
            <div class="row">
                <div class="col-xl-12">
                    <div class="dashboard-box">

                        <div class="headline">
                            <h3>Add your request</h3>
                        </div>

                        <div class="content with-padding padding-bottom-10">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Title of request</h5>
                                        <input type="text" class="utf-with-border" placeholder="Ex : N7eb 5kg degla "
                                            name="title" value="{{ old('title') }}" />
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Name</h5>
                                        <input type="text" class="utf-with-border" value="{{ $user->name }}" />
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Your address</h5>
                                        <div class="utf-input-with-icon">
                                            <input class="utf-with-border" type="text" placeholder="Enter your address"
                                                name="Dadress" value="{{ old('Dadress') }}" />
                                            <i class="icon-material-outline-location-on"></i>
                                            @error('Dadress')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Category</h5>
                                        <select class="selectpicker utf-with-border" data-size="7"
                                            title="Choose a category" id="cat_id" name='cat_id'>
                                            @foreach (\App\Models\Category::where('status', 'active')->get() as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ old('cat_id') == $cat->id ? 'selected' : '' }}>{{ $cat->title }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @error('cat_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5 for="country">Country</h5>
                                        <select class="selectpicker utf-with-border" id="country-dropdown"
                                            data-value="0 To 6 Years" data-size="7" title="Votre Pays" name="country_id">
                                            <option value="">Select your country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5 for="state">City </h5>
                                        <select id="state-dropdown" class="form-control" data-value="0 To 6 Years"
                                            data-size="7" name="state_id">
                                        </select>
                                        @error('state_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Budget of the mission</h5>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-sm-6">
                                                <div class="utf-input-with-icon">
                                                    <input class="utf-with-border" type="number" placeholder="Budget Min"
                                                        name="Bmin" value="{{ old('Bmin') }}" />
                                                    <i class="currency">USD</i>
                                                    @error('Bmin')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-sm-6">
                                                <div class="utf-input-with-icon">
                                                    <input class="utf-with-border" type="number" placeholder="Budget Max"
                                                        name="Bmax" value="{{ old('Bmax') }}" />
                                                    <i class="currency">TND</i>
                                                    @error('Bmax')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Deadline of the mission</h5>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-sm-6">
                                                <div class="bidding-fields">
                                                    <div class="bidding-field">
                                                        <div class="qtyButtons">
                                                            <div class="qtyDec"></div>
                                                            <input type="number" name="Nombred"
                                                                value="{{ old('Nombred') }}" />
                                                            <div class="qtyInc"></div>
                                                            @error('Nombred')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-sm-6">
                                                <div class="bidding-field">
                                                    <select class="selectpicker default" name='Date'>
                                                        <option value="Mois"
                                                            {{ old('Date') == 'Mois' ? 'selected' : '' }}>Month
                                                        </option>
                                                        <option value="Jours"
                                                            {{ old('Date') == 'Jours' ? 'selected' : '' }}>
                                                            Days</option>
                                                        <option value="Heurs"
                                                            {{ old('Date') == 'Heurs' ? 'selected' : '' }}>
                                                            Hours</option>
                                                    </select>
                                                    @error('Date')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5>Images</h5>
                                    <div class="uploadButton margin-top-15 margin-bottom-30">
                                        <input class="uploadButton-input" type="file" accept="image/*, application/pdf"
                                            multiple>
                                        <label class="uploadButton-button ripple-effect" for="upload" id="lfm"
                                            data-input="thumbnail" data-preview="holder">Upload images (Max 5 images)</label>
                                            <input id="thumbnail" class="form-control" type="hidden" name="Dimage" placeholder="Télécharger (jpg, png, pjeg)">
                                        @error('Dimage')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:200px;"> </div>

                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5>Your location on Google Maps  </h5>
                                    <div id="map"></div>
                                </div>
                                <input type="hidden" id="lat" name="lat" />
                                <input type="hidden" id="lng" name="lng" />


                            </div>
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5>Description of the mission </h5>
                                    <textarea cols="40" rows="2" class="utf-with-border" placeholder="Description ..." name="Ddesc"
                                        value="{{ old('Ddesc') }}"></textarea>
                                    @error('Ddesc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="utf-centered-button">
            <button type="submit" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Publish my request <i class="icon-feather-plus"></i></button>
        </div>
    </form>
@endsection

@section('scripts')
    <!-- Google API & Maps -->
    <!-- Geting an API Key: https://developers.google.com/maps/documentation/javascript/get-api-key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>
    <script src="js/custom_jquery.js"></script>
    <script type="text/javascript">
        var map;
        var elevator;
        var myOptions = {
            zoom: 3,
            center: new google.maps.LatLng(34.741488563952004, 10.755425759448851),
            mapTypeId: 'terrain'
        };
        map = new google.maps.Map($('#map')[0], myOptions);
        var marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(34.741488563952004, 10.755425759448851),
            draggable: true
        });
        google.maps.event.addListener(marker, 'dragend', function() {
            console.log(marker.position.lat())
            console.log(marker.position.lng())
            document.getElementById('lat').value = marker.position.lat();
            document.getElementById('lng').value = marker.position.lng();



            
        });
        google.maps.event.addListener(map, 'click', function(evt) {
            console.log('click')
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script>
        $('#lfm').filemanager('image');
    </script>

    <script>
        $.noConflict();
        $(document).ready(function() {
            $('#country-dropdown').on('change', function() {

                var country_id = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{ url('get-states-by-country') }}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dropdown').html('<option value="" > Select City </option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value.id +
                                '" >' + value.name + '</option>');

                        });
                    }
                });
            });
        });
    </script>
@endsection
