@extends('frontend.layouts.master')

@section('content')
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header text-center bg-light text-dark"> <i class="icofont-check-circled"></i>
                        Checking code </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('2fa.post') }}">
                            @csrf

                            <p class="text-center"> Please enter the code we just send on your mobile phone </p>

                            @if ($message = Session::get('success'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($message = Session::get('error'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input id="code" type="number"
                                        class="form-control @error('code') is-invalid @enderror text-center " name="code"
                                        value="{{ old('code') }}" required autocomplete="code" autofocus>

                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <a class="btn btn-warning text-white margin-top" href="{{ route('2fa.resend') }}"
                                            style="width:57%">Resend Code ?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="margin-top-10 button utf-button-sliding-icon ripple-effect"
                                        style="width:50%">
                                        Submit <i class="icon-feather-chevron-right"></i>
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
