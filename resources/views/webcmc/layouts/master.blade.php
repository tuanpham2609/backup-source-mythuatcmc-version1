<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="@yield('description')" />
    <meta name="author" content="@yield('description')" />
    <meta name="keywords" content="@yield('description')" />
    <meta name="robots" content="index,follow" />
    <title>@yield('title')</title>
   
    <meta name="keywords" content="@yield('keyword')" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('metacontent')" />
    <meta property="og:url" content="@yield('metaurl')" />
    <meta property="og:description" content="@yield('metadescription')" />                                                                                                  
    <meta property="og:image" content="@yield('img')" />
    <meta property="og:site_name" content="My thuat cmc | trung tam day my thuat TP.HCM | trung tam day my thuat cmc tai TP.HCM" />
    <meta property="og:locale" content="vi_VN">
    <base href="{{ asset('') }}">
    

    <!-- Bootstrap Core CSS -->
    <link rel='stylesheet prefetch' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
    <link href="resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/vendor/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="resources/vendor/WOW-master/css/libs/animate.css" rel="stylesheet">
    <link href="resources/vendor/slick/slick.css" rel="stylesheet">
    <link href="resources/vendor/slick/slick-theme.css" rel="stylesheet">
    <link href="resources/vendor/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resources/vendor/jssocials/jssocials.css" />
    <link rel="stylesheet" type="text/css" href="resources/vendor/jssocials/jssocials-theme-flat.css" />
    @foreach($customs as $value)
        <link rel="icon" type="image/png" sizes="32x32" href="img/{{$value->logo}}">
        <link rel="icon" type="image/png" sizes="96x96" href="img/{{$value->logo}}">
        <link rel="icon" type="image/png" sizes="16x16" href="img/{{$value->logo}}">
    @endforeach
    

<!-- Custom CSS -->
    <link rel="stylesheet" href="resources/css/main.css?v=<?php echo strtotime("now"), "\n"; ?>" rel="stylesheet">
</head>

<body>

    <section class="main">
        @include('webcmc.layouts.header')
        <section class="wrapper">
            @yield('content')
        </section>
        @include('webcmc.layouts.footer')
    </section>
    <!-- jQuery -->
    <script src="resources/vendor/jquery/jquery.js"></script>
    <script src="resources/vendor/jssocials/jssocials.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js'></script>
    <script src="resources/vendor/masonry/masonry.min.js"></script>
    <script src="resources/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="resources/vendor/WOW-master/dist/wow.min.js"></script>
    <script src="resources/vendor/slick/slick.js"></script>
    <script src="resources/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="vendor/notification/bootstrap-notify.js"></script>
    <script src="assets/js/helper.js"></script>
    <script src="assets/js/vue.js"></script>
    <script src="assets/js/axios/axios.min.js"></script>
    <script  type="text/javascript" src="resources/js/main.js?v=<?php echo strtotime("now"), "\n"; ?>"></script>
    @yield('script')
</body>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v5.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="104513430990330"
  theme_color="#20cef5"
  logged_in_greeting="Hi! My thuat cmc co the giup gi cho ban ?"
  logged_out_greeting="Hi! My thuat cmc co the giup gi cho ban ?">
      </div>

</html>