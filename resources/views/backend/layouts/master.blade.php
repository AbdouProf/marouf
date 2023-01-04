<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ff8a00" />
    <meta name="description" content="Job Portal HTML Template" />
    <meta name="keywords" content="Employment, Naukri, Shine, Indeed, Job Posting, Job Provider" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('frontend.layouts.custom')


    <title>Maarouf - Plateforme pour les micros services</title>
    <link rel="shortcut icon" href="/img/favicon.png" />
    
</head>

<body>

    <!-- Preloader Start -->
    
    <!-- Overlay For Sidebars -->


    <div>

        @include('frontend.layouts.header')

        <div class="utf-dashboard-container-aera">

            @include('backend.layouts.sidebar')
            <div class="utf-dashboard-content-container-aera" data-simplebar="">
                @include('frontend.layouts.notification')
                @include('backend.layouts.headbar')
                @yield('content')
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>
    {{ \TawkTo::widgetCode('https://tawk.to/chat/62727f40b0d10b6f3e70950e/1g27k25jb') }}

 
</body>

</html>
