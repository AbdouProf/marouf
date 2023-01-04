@extends('backend.layouts.master')


@section('content')
    <div class="utf-dashboard-content-inner-aera">
        <div class="row">
            <div class="col-xl-6">
                <div class="dashboard-box margin-top-0 margin-bottom-30">
                    <div class="headline">
                        <h3>Détails de mon profile</h3>
                    </div>

                    <form action="{{ route('update.account', $user->id) }}" method="POST">
                        @csrf
                        <div class="content with-padding padding-bottom-0">
                            <div class="row">
                                <div class="col">
                                    <div class="row">

                                        <div class="col-xl-12 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>Changer photo de profile</h5>
                                                <div class="input-group">
                                                    <span class="uploadButton">
                                                        <label id="lfm" data-input="thumbnail" data-preview="holder"
                                                            class="uploadButton-button ripple-effect"> <i class="icofont-image "> </i>  Choose
                                                        </label>
                                                    </span>
                                                    <input id="thumbnail" class="form-control" type="text"
                                                        name="image" value="{{ $user->image }}">
                                                </div>
                                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                                @error('image')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>Mon nom</h5>
                                                <input type="text" class="utf-with-border" name="name" id="name"
                                                    value="{{ $user->name }}" />    
                                                    
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>Téléphone</h5>
                                                <input type="text" class="utf-with-border" value="{{ $user->phone }}"
                                                    disabled />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>Adresse email</h5>
                                                <input type="text" class="utf-with-border" name="email" id="email"
                                                    value="{{ $user->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-sm-12">
                                            <div class="utf-submit-field">
                                                <h5>A propos de moi</h5>
                                                <textarea name="desc" id="desc" class="utf-with-border" cols="20" rows="3"> <?php echo e($user->desc); ?>
                                                </textarea>                                              
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5><i class="icon-brand-facebook"></i> Facebook</h5>
                                                <input type="text" class="utf-with-border" value="{{ $user->fblink }}"
                                                    name="fblink" id="fblink" placeholder="Votre facebook link" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="button ripple-effect big margin-top-10 margin-bottom-20">Save
                                Changes </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xl-6">
                <div id="test1" class="dashboard-box margin-top-0">
                    <div class="headline">
                        <h3>Changer mon mot de passe</h3>
                    </div>
                    <form action="{{ route('update.password', $user->id) }}" method="POST">
                        @csrf
                        <div class="content with-padding">
                            <div class="row">
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Mot de passe actuelle</h5>
                                        <input type="password" class="utf-with-border" title="Current Password"
                                            data-tippy-placement="top" placeholder="********" id="currentPass"
                                            name="oldpassword" />
                                        @error('oldpassword')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Nouvelle mot de passe</h5>
                                        <input type="password" class="utf-with-border"
                                            title="The password must be at least 8 characters" data-tippy-placement="top"
                                            placeholder="********" id="newPass" name="newpassword" />
                                        @error('newpassword')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="button ripple-effect big margin-top-10 margin-bottom-20">Changer le
                                mot de
                                passe </button>
                        </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">

    
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script>
            $('#lfm').filemanager('image');
        </script>
    @endsection
