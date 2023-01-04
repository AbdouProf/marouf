@extends('backend.layouts.master')


@section('content')
    <div class="utf-dashboard-content-inner-aera">
        <div class="row">
            <div class="col-xl-6">
                <div class="dashboard-box margin-top-0 margin-bottom-30">
                    <div class="headline">
                        <h3>My Profile Details</h3>
                    </div>

                    <form action="{{ route('update.account', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="content with-padding padding-bottom-0">
                            <div class="row">
                                <div class="col">
                                    <div class="row">

                                        <div class="col-xl-12">
                                            <div class="row">
                                                <div class="col-xl-5 col-md-3 col-sm-4">
                                                    <div class="utf-avatar-wrapper" data-tippy-placement="top" title="Change Profile Picture">
                                                        <img class="profile-pic" @if ($user->image == NULL)  src="img/user-avatar-placeholder.png"  @else src="{{ $user->image }}" @endif alt=""/>
                                                        <div class="upload-button"></div>
                                                        <input class="file-upload" name="image" type="file" accept="image/*" />
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>Your Name</h5>
                                                <input type="text" class="utf-with-border" name="name" id="name"
                                                    value="{{ $user->name }}" />    
                                                    
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>Phone Number</h5>
                                                <input type="text" class="utf-with-border" value="{{ $user->phone }}"
                                                    disabled />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>Email Address</h5>
                                                <input type="text" class="utf-with-border" name="email" id="email"
                                                    value="{{ $user->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-sm-12">
                                            <div class="utf-submit-field">
                                                <h5>About me</h5>
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
                        <h3>Change Password</h3>
                    </div>
                    <form action="{{ route('update.password', $user->id) }}" method="POST">
                        @csrf
                        <div class="content with-padding">
                            <div class="row">
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Current Password</h5>
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
                                        <h5>New Password</h5>
                                        <input type="password" class="utf-with-border"
                                            title="The password must be at least 8 characters" data-tippy-placement="top"
                                            placeholder="********" id="newPass" name="newpassword" />
                                        @error('newpassword')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="button ripple-effect big margin-top-10 margin-bottom-20">Changes Password </button>
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
