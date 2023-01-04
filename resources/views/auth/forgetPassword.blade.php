
@extends('frontend.layouts.master')

@section('content')
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header text-center bg-light text-dark"> <i class="icon-line-awesome-rotate-left
                    "></i>
                        Reset Password </div>

                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                           {{ Session::get('message') }}
                       </div>
                        @endif

                    <div class="card-body">
                      <form action="{{ route('forget.password.post') }}" method="POST">
                            @csrf

                            <p class="text-center"> Please enter your email adress </p>
                            
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="margin-top-10 button utf-button-sliding-icon ripple-effect"
                                        style="width:50%">
                                        Send Password Reset Link <i class="icon-feather-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
