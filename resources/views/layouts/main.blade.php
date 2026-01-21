<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . "    | Mizkas Apparel" : " Mizkas Apparel " }}</title>
    <meta name="description" content="Discover new season styles and customized fashion at Mizkas Apparel. Shop jackets, shirts, trousers, and more with free shipping and returns. Limited time fashion sale.">
<!-- Open Graph Meta Tags for Social Media -->
<meta property="og:title" content="Mizkas Apparel - Custom Fashion Clothing | New Season Sale">
<meta property="og:description" content="Shop trendy jackets, pants, polos, and more with Mizkas Apparel's built-in customizer. Enjoy free shipping and hassle-free returns. Don't miss out on our limited-time fashion sale!">
<meta property="og:image" content="URL_TO_FEATURED_IMAGE">
<meta property="og:url" content="https://www.mizkasapparel.store">
<meta property="og:type" content="website">
<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Mizkas Apparel - Custom Fashion Clothing | Fashion Sale">
<meta name="twitter:description" content="Explore custom and ready-made fashion items. Enjoy free shipping and returns. Shop now for exclusive deals!">
<meta name="twitter:image" content="URL_TO_FEATURED_IMAGE">
<!-- Keywords Meta Tag -->
<meta name="keywords" content="custom clothing, fashion sale, free shipping, jackets, pants, polo shirts, Mizkas Apparel, men's fashion, customizable clothes, fashion store">

<!-- Robots Meta Tag -->
<meta name="robots" content="index, follow">

<!-- Author Meta Tag -->
<meta name="author" content="Mizkas Apparel">
<!-- Additional Meta Tag -->
<link rel="canonical" href="https://www.mizkasapparel.store">
    @include('layouts.links')
    @yield('css')
</head>
<input type="hidden" name="" id="web_base_url" value="{{url('/')}}">
<body>
<!-- TikTok Pixel Code Start -->
<script>
!function (w, d, t) {
  w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(
var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script")
;n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};


  ttq.load('D5OL04RC77U96LQ56NL0');
  ttq.page();
}(window, document, 'ttq');
</script>
<!-- TikTok Pixel Code End -->

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '648598251079960');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=648598251079960&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
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
