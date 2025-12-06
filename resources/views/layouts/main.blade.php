<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5JCNMZTZ');</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . "    | NOHFIL" : " NOHFIL " }}</title>
    <meta name="description" content="Discover new season styles and customized fashion at NOHFIL. Shop jackets, shirts, trousers, and more with free shipping and returns. Limited time fashion sale.">
<!-- Open Graph Meta Tags for Social Media -->
<meta property="og:title" content="NOHFIL - Custom Fashion Clothing | New Season Sale">
<meta property="og:description" content="Shop trendy jackets, pants, polos, and more with NOHFIL's built-in customizer. Enjoy free shipping and hassle-free returns. Don't miss out on our limited-time fashion sale!">
<meta property="og:image" content="URL_TO_FEATURED_IMAGE">
<meta property="og:url" content="https://www.nohfil.com">
<meta property="og:type" content="website">
<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="NOHFIL - Custom Fashion Clothing | Fashion Sale">
<meta name="twitter:description" content="Explore custom and ready-made fashion items. Enjoy free shipping and returns. Shop now for exclusive deals!">
<meta name="twitter:image" content="URL_TO_FEATURED_IMAGE">
<!-- Keywords Meta Tag -->
<meta name="keywords" content="custom clothing, fashion sale, free shipping, jackets, pants, polo shirts, NOHFIL, men's fashion, customizable clothes, fashion store">

<!-- Robots Meta Tag -->
<meta name="robots" content="index, follow">

<!-- Author Meta Tag -->
<meta name="author" content="NOHFIL">
<!-- Additional Meta Tag -->
<link rel="canonical" href="https://www.nohfil.com">
    @include('layouts.links')
    @yield('css')
</head>
<input type="hidden" name="" id="web_base_url" value="{{url('/')}}">
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JCNMZTZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('js')
    <script type="text/javascript">
        (() => {

            @if (session('notify_success'))
                $.toast({
                    heading: 'Success!',
                    position: 'bottom-right',
                    text: '{{ session('notify_success') }}',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 2000,
                    stack: 6
                });
            @elseif (session('notify_error'))
                $.toast({
                    heading: 'Error!',
                    position: 'bottom-right',
                    text: '{{ session('notify_error') }}',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 2000,
                    stack: 6
                });
            @endif

        })()
    </script>
</body>
@include('layouts.errorhandler')
@include('admin.core.editor')
<div id="preloader" style="display:none;">
    <div class="loading">
        <span>Loading...</span>
    </div>
</div>

</html>
