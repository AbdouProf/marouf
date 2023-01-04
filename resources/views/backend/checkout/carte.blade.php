@extends('frontend.layouts.master')

@section('content')

<!-- Titlebar -->
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Payment with stripe</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index-1.html">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Payment with stripe</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-8 utf-content-right-offset-aera">
         
            <div class="utf-boxed-list-headline-item ">
                <h3><i class="icon-line-awesome-cc-visa"></i> Payment with stripe</h3>
            </div>
            <div class="payment">
                <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <input type="hidden" name="offre_id" id="offre_id"
                    value="{{ $offre->id }}"> 
                    <div class="payment-tab payment-tab-active">
                        <div class="utf-payment-tab-trigger">
                            <input type="radio" name="cardType" id="creditCart" value="creditCard" checked>
                            <label for="creditCart">Detail </label>
                            <img class="payment-logo" src="img/pay_icon.png" alt="">
                        </div>
                        <div class="utf-payment-tab-content-aera">
                            <div class="row payment-form-row">
                                <div class="col-md-6">
                                    <label for="cardNumber">Card Number</label>
                                    <input class="utf-with-border form-control card-number" id="cardnumber" type="number" placeholder="Card Number"
                                    autocomplete='off' size='20' required>
                                </div>
                                <div class="col-md-6">
                                    <label for="cardNumber">Card Holder Name</label>
                                    <input class="utf-with-border" id="nameoncard" type="text"
                                        placeholder="Card Holder Name" autocomplete='off' size='20' required>
                                </div>
                                <div class="col-md-4">
                                    <label for="cardNumber">Expiry Month</label>
                                    <input class="utf-with-border form-control card-expiry-month" id="expirydate" type="text"
                                        placeholder="Expiry Month" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="expiryDate">Expiry Year</label>
                                    <input class="utf-with-border form-control card-expiry-year" id="expiryndate" type="text"
                                        placeholder="Expiry Year" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="expirydate">CVV Code</label>
                                    <input class="utf-with-border form-control card-cvc" size='4' id="cvv" required type="password" placeholder="***">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button
                    class=" btn margin-top-15 button full-width utf-button-sliding-icon ripple-effect"
                    type="submit" >Accept and pay <i
                     class="icon-feather-chevrons-right"></i>
                 </button>
                   
                </form>

            </div>
        </div>
        <div class="col-xl-4 col-lg-4 margin-top-0 margin-bottom-60">
            <div class="boxed-widget summary margin-top-0">
                <div class="utf-boxed-widget-headline">
                    <h3>Payment detail</h3>
                </div>
                <div class="utf-boxed-widget-inner">
                    <ul>
                        <li>Date of offer <span> {{ date_format($offre->created_at, 'Y-M-d') }}</span></li>
                        <li>Amount of the offer <span> {{$offre->Mnt_offre}} TND </span></li>
                        <li>Comission (5%) <span> {{($offre->Mnt_offre)*0.05}} TND </span></li>
                        <li class="total-costs">Total <span> {{($offre->Mnt_offre)+(($offre->Mnt_offre)*0.05)}}
                                TND</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container / End -->

@endsection

@section('scripts')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
              number: $('.card-number').val(),
              cvc: $('.card-cvc').val(),
              exp_month: $('.card-expiry-month').val(),
              exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    });

    function stripeResponseHandler(status, response) {
        if(response.error) {
            $('.error')
            .removeClass('hide')
            .find('.alert')
            .text(response.error.message);
        }else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
        }
    }
});
</script>
@endsection