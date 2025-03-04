<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W3V294QH');</script>
<!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#342336" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/img/icon/fa.png">
    <title>@isset( $metaTitle ){{ $metaTitle }}@else Secret desire @endisset</title>
    <meta name="description" content="@isset($metaDescription ){{$metaDescription}}@else Secret desire @endisset">
   
   <link rel="canonical" href="<?php
   $haystack = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   echo  preg_replace('/\?.*/', '', $haystack);
   /*$needle   = '?comment=true';

   $pos      = strripos($haystack, $needle);

   if ($pos === false) {
       echo $haystack;
   } else {

       $canonical = str_replace('?comment=true', '', $haystack);

       echo $canonical;
   } */
   ?>" />
    <link href="{{ asset( 'new-style.css?v=13' ) }}" rel="stylesheet">
<meta property="og:site_name" content="SecretDesire">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo  preg_replace('/\?.*/', '', $haystack);?>">
    <meta property=og:locale content=en_US />
    <meta property="og:image" content="https://secretdesire.co/img/secretdesire.jpg">
    <meta property="og:image:url" content="https://secretdesire.co/img/secretdesire.jpg">
    <meta property="og:image:secure_url" content="https://secretdesire.co/img/secretdesire.jpg">
    <meta property="og:image:width" content="256">
    <meta property="og:image:height" content="256">
<meta property="og:title" content="{{ $metaTitle ?? 'SecretDesire - Best erotic massage. Erotic body massage. Erotic massage orgasm. Adult massage' }}">
<meta property="og:description" content="{{ $metaDescription ?? 'Ethical massage services. Escort services. Reasonable prices. High quality' }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@secdesire">
    <meta name="twitter:title" content="{{ $metaTitle ?? 'SecretDesire - Best erotic massage. Erotic body massage. Erotic massage orgasm. Adult massage' }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? 'Ethical massage services. Escort services. Reasonable prices. High quality' }}">
    <meta name="twitter:image:src" content="https://secretdesire.co/img/secretdesire.jpg">
    <meta name="twitter:image:width" content="256">
    <meta name="twitter:image:height" content="256">
    <meta name="twitter:domain" content="secretdesire.co">
    <meta name="robots" content="{{ isset($index) ? ($index === false ? 'noindex, follow' : 'index, follow') : 'index, follow' }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset( 'new-style.css?v=12' ) }}" rel="stylesheet">
    @agent()
        @yield( 'agentstyles' )
    @else
    	@auth
        <script src="//code.jivosite.com/widget.js" data-jv-id="hBCSQVJ2Fu" async></script>
        @endauth
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset( 'small.css?v=12' ) }}" rel="stylesheet">
        <link href="{{ asset( 'global.css?v=12' ) }}" rel="stylesheet">
        @yield( 'styles' )
    @endagent

            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150088019-1"></script>
            <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-150088019-1');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js" integrity="sha256-0H3Nuz3aug3afVbUlsu12Puxva3CP4EhJtPExqs54Vg=" crossorigin="anonymous"></script>
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W3V294QH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div id="app">
        @include( 'partials/header' )
        @include( 'partials/navbar' )

        <main class="py-4 py-md-5 contente">
            @yield('content')
        </main>
        @include( 'partials/footer' )
    </div>
    @agent()
        <script src="{{ asset( 'new-scripts.js' ) }}" defer></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @else
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        @yield( 'scripts' )
        <script src="{{ asset( 'new-scripts.js?v=13' ) }}" defer></script>
    @endagent
    @yield( 'styles-footer' )
    @agent()
    @else
        @yield( 'modals' )
    @endagent
    @guest
      @include( 'partials/modal' )
    @endguest
</body>
</html>
