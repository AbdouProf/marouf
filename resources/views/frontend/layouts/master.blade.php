<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ff8a00" />
    <meta name="description" content="Job Portal HTML Template" />
    <meta name="keywords" content="Employment, Naukri, Shine, Indeed, Job Posting, Job Provider" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Maarouf - Plateforme pour les micros services</title>
    <link rel="shortcut icon" href="/img/favicon.png" />
    @include('frontend.layouts.custom')

    

</head>

<body>
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="utf-preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Overlay For Sidebars -->

    @include('frontend.layouts.header')
   

    @yield('content')
    @include('frontend.layouts.notification')

    @include('frontend.layouts.subscribe')

    @include('frontend.layouts.footer')

    {{ \TawkTo::widgetCode('https://tawk.to/chat/62727f40b0d10b6f3e70950e/1g27k25jb') }}

</body>


</html>
