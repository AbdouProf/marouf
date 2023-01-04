@extends('backend.layouts.master')


@section('content')
    <div class="utf-dashboard-content-inner-aera">
        <div class="row">
            <div class="col-xl-12">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3>Information de la mission</h3>
                    </div>
                    <div class="content with-padding padding-bottom-10">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Nom</h5>
                                    <input type="text" class="utf-with-border" placeholder="Tapez votre nom" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Prénom</h5>
                                    <input type="text" class="utf-with-border" placeholder="Tapez votre prénom" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Votre adresse</h5>
                                    <div class="utf-input-with-icon">
                                        <input class="utf-with-border" type="text" placeholder="Tapez votre adresse" />
                                        <i class="icon-material-outline-location-on"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Catégorie</h5>
                                    <select class="selectpicker utf-with-border" data-size="7"
                                        title="Choisir une Catégorie">
                                        <option>A9thili</option>
                                        <option>Livrili</option>
                                        <option>Wasalni</option>
                                        <option>Sala7li</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Votre Pays</h5>
                                    <select class="selectpicker utf-with-border" data-value="0 To 6 Years" data-size="7"
                                        title="Votre Pays">
                                        <option>Tunisie</option>
                                        <option>France</option>
                                        <option>Germany</option>
                                        <option>Turkey</option>
                                        <option>Marroc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Votre région</h5>
                                    <select class="selectpicker utf-with-border" data-value="0 To 6 Years" data-size="7"
                                        title="Votre région">
                                        <option>Sfax</option>
                                        <option>Tunis</option>
                                        <option>Sousse</option>
                                        <option>Mahdia</option>
                                        <option>Gabes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Budget de la mission</h5>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-input-with-icon">
                                                <input class="utf-with-border" type="text" placeholder="Budget Min" />
                                                <i class="currency">USD</i>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-input-with-icon">
                                                <input class="utf-with-border" type="text" placeholder="Budget Max" />
                                                <i class="currency">USD</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Date limite de la mission</h5>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="bidding-fields">
                                                <div class="bidding-field">
                                                    <div class="qtyButtons">
                                                        <div class="qtyDec"></div>
                                                        <input type="text" name="qtyInput" value="1" />
                                                        <div class="qtyInc"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="bidding-field">
                                                <select class="selectpicker default">
                                                    <option selected="">Jours</option>
                                                    <option>Heurs</option>
                                                    <option>Mois</option>
                                                </select>
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
                                        id="upload" multiple>
                                    <label class="uploadButton-button ripple-effect" for="upload">Télécharger des images
                                        (Max 5 images)</label>
                                    <span class="uploadButton-file-name">Télécharger (jpg, png, pjeg) File.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="utf-submit-field">
                                <h5>Votre emplacement sur Google Maps</h5>
                                <div id="map"></div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="utf-submit-field">
                                <h5>Déscription de la mission</h5>
                                <textarea cols="40" rows="2" class="utf-with-border" placeholder="Déscription..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="utf-centered-button">
        <a href="javascript:void(0);" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Publier ma
            demande <i class="icon-feather-plus"></i></a>
    </div>
@endsection

@section('scripts')
    <!-- Google API & Maps -->
    <!-- Geting an API Key: https://developers.google.com/maps/documentation/javascript/get-api-key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>
    <script src="js/custom_jquery.js"></script>
    <script type="text/javascript">
        var map;
        var elevator;
        var myOptions = {
            zoom: 3,
            center: new google.maps.LatLng(46.87916, -3.32910),
            mapTypeId: 'terrain'
        };
        map = new google.maps.Map($('#map')[0], myOptions);
        var marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(46.87916, -3.32910),
            draggable: true
        });
        google.maps.event.addListener(marker, 'dragend', function() {
            console.log(marker.position)
        });
        google.maps.event.addListener(map, 'click', function(evt) {
            console.log('click')
        });
    </script>
@endsection
