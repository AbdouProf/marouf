@extends('frontend.layouts.master')

@section('content')

<div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Contact Us</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="index-1.html">Home</a></li>
              <li>Contact Us</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
         
	  <div class="col-xl-4 col-lg-4">
		<div class="utf-boxed-list-headline-item margin-bottom-35">
            <h3><i class="icon-feather-map-pin"></i> Office Address</h3>
        </div>
		<div class="utf-contact-location-info-aera margin-bottom-50">
			<div class="contact-address">
				<ul>
				  <li><strong>Phone:-</strong> (+216) 74 320 000</li>
				  <li><strong>Website:-</strong> <a href="#">www.maarouf.tb</a></li>
				  <li><strong>E-Mail:-</strong> <a href="#">serviceclient@maarouf.tn</a></li>              
				  <li><strong>Address:-</strong> Avenu majid boulia Sfax - Tunisie </li>
				</ul>
			</div>
		</div>		
	  </div>
	  <div class="col-xl-8 col-lg-8">
        <section id="contact" class="margin-bottom-50">
          <div class="utf-boxed-list-headline-item margin-bottom-35">
            <h3><i class="icon-material-outline-description"></i> Contact Us</h3>
          </div>
		  <div class="utf-contact-form-item">
			  <form action="{{route('contact.submit')}}" method="post" id="main_contact_form">
                @csrf
				<div class="row">
				  <div class="col-md-6">
					<div class="utf-no-border">
					  <input class="utf-with-border" name="f_name" id="f-name" type="text"  placeholder="Your first name" required  value="{{old('f_name')}}" />
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="utf-no-border">
					  <input class="utf-with-border" name="l_name" id="l-name" type="text"  placeholder="Votre last name" required value="{{old('l_name')}}"/>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="utf-no-border">
					  <input class="utf-with-border"  name="email" id="email" type="email"  placeholder="Email Address" required value="{{old('email')}}" />
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="utf-no-border">
					  <input class="utf-with-border" name="subject" type="text" id="subject" placeholder="Object" required  value="{{old('subject')}}"/>
					</div>
				  </div>
				</div>
				<div>
				  <textarea class="utf-with-border" name="message" cols="40" rows="3" id="message" placeholder="Message..." required>{{old('message')}}</textarea>
				</div>
				<div class="utf-centered-button margin-top-10">
					<input type="submit" class="submit button" value="Send" />
				</div>
			  </form>
		  </div>
        </section>
      </div>
    </div>
  </div>



@endsection


@section('scripts')

<script src="https://maps.googleapis.com/maps/api/js?key=&amp;libraries=places"></script> 
<script src="js/infobox.min.js"></script> 
<script src="js/markerclusterer.js"></script> 
<script src="js/maps.js"></script>

@endsection