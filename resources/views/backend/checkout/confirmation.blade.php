@extends('frontend.layouts.master')

@section('content')

<!-- Container -->
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="utf-order-confirm-aera">
          <i class="icon-feather-check-circle"></i>
          <h2 class="margin-top-30">Offer Accepted !</h2>
          <p>Thank you ! <a href="#"> Maarouf</a></p>
          <a  href="{{route('demande.show')}}" class="button margin-top-30">My requests</a>
		</div>
      </div>
    </div>
  </div>

@endsection