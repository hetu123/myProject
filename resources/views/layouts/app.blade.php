<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Image-->
    <link rel="icon" type="image/png" sizes="16x16"  href="{{ asset('assets/images/favicon.png') }}" >


    <!-- Scripts -->
  {{--  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/myscript.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/waves.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/jquery.ui.touch-punch-improved.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/jquery-ui.min.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/sidebarmenu.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/custom.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/pages/calendar/cal-init.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/pages/chart/chart-init.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/pages/chart/chart-page-init.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/pages/dashboards/dashboard1.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/pages/maps/map-google.init.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/pages/mask/mask.init.js') }}" defer></script>
    <script type="text/javascript"  src="{{ asset('js/pages/sparkline/jquery.charts-sparkline.js') }}" defer></script>--}}


    <link href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->
      <link href="{{ asset('assets/libs/flot/css/float-chart.css') }}" rel="stylesheet" type="text/css" >
    <!-- Custom CSS -->
      <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" type="text/css" >
    <!-- Fonts -->
   {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
--}}
    <!--External -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


    <!-- Styles -->
    <!-- Custom CSS -->
    <link href="{{ asset('assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css" rel="stylesheet') }}" rel="stylesheet">

   {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/icons/font-awesome/css/fa-brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/css/fa-regular.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/css/fa-solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_animated.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_bordered-pulled.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_core.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_fixed-width.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_icons.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_larger.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_list.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_mixins.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_rotated-flipped.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_screen-reader.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_stacked.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/_variables.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/fa-brands.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/fa-regular.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/fa-solid.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/less/fontawesome.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_animated.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_bordered-pulled.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_core.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_fixed-width.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_icons.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_larger.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_list.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_mixins.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_rotated-flipped.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_screen-reader.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_stacked.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/_variables.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/fa-brands.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/fa-regular.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/fa-solid.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/scss/fontawesome.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-brands-400.eot') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-brands-400.svg') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-brands-400.ttf') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-brands-400.woff') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-brands-400.woff2') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-regular-400.eot') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-regular-400.svg') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-regular-400.ttf') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-regular-400.woff') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-regular-400.woff2') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-solid-900.eot') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-solid-900.svg') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-solid-900.ttf') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-solid-900.woff') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/font-awesome/webfonts/fa-solid-900.woff2') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/fonts/Material-Design-Iconic-Font.eot') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/fonts/Material-Design-Iconic-Font.svg') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/fonts/Material-Design-Iconic-Font.ttf') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/fonts/Material-Design-Iconic-Font.woff') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/fonts/Material-Design-Iconic-Font.woff2') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/fonts/materialdesignicons-webfont.eot') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/fonts/materialdesignicons-webfont.svg') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/fonts/materialdesignicons-webfont.ttf') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/fonts/materialdesignicons-webfont.woff') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/material-design-iconic-font/fonts/materialdesignicons-webfont.woff2') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/themify-icons/fonts/themify.eot') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/themify-icons/fonts/themify.svg') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/themify-icons/fonts/themify.ttf') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/themify-icons/fonts/themify.woff') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/themify-icons/ie7/ie7.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/themify-icons/ie7/ie7.js') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/themify-icons/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/css/weather-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/css/weather-icons-core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/css/weather-icons-variables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/css/weather-icons-wind.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/fonts/weathericons-regular-webfont.eot') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/fonts/weathericons-regular-webfont.svg') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/fonts/weathericons-regular-webfont.ttf') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/fonts/weathericons-regular-webfont.woff') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/fonts/weathericons-regular-webfont.woff2') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/css/variables-beaufort.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/css/variables-day.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/css/variables-direction.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/css/variables-misc.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/css/variables-moon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/css/variables-neutral.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/css/variables-night.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/css/variables-time.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/css/variables-wind-names.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-beaufort.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-day.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-direction.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-misc.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-moon.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-moon-aliases.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-neutral.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-night.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-time.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-wind.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-wind-aliases.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-classes/classes-wind-degrees.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-variables/variables-beaufort.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-variables/variables-day.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-variables/variables-direction.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-variables/variables-misc.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-variables/variables-moon.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-variables/variables-neutral.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-variables/variables-night.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-variables/variables-time.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/icon-variables/variables-wind-names.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/mappings/wi-forecast-io.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/mappings/wi-owm.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/mappings/wi-wmo4680.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/mappings/wi-yahoo.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/weather-icons.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/weather-icons.min.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/weather-icons-classes.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/weather-icons-core.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/weather-icons-variables.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/weather-icons-wind.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/less/weather-icons-wind.min.less') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-beaufort.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-day.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-direction.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-misc.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-moon.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-moon-aliases.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-neutral.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-night.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-time.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-wind.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-wind-aliases.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-classes/classes-wind-degrees.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-variables/variables-beaufort.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-variables/variables-day.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-variables/variables-direction.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-variables/variables-misc.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-variables/variables-moon.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-variables/variables-neutral.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-variables/variables-night.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-variables/variables-time.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/icon-variables/variables-wind-names.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/mappings/wi-forecast-io.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/mappings/wi-owm.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/mappings/wi-wmo4680.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/mappings/wi-yahoo.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/weather-icons.min.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/weather-icons.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/weather-icons-classes.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/weather-icons-core.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/weather-icons-variables.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/weather-icons-wind.min.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/weather-icons/sass/weather-icons-wind.scss') }}" rel="stylesheet">
--}}



    <!-- External-->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
</head>
{{--<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="float: right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item" >
                                <a class="nav-link"  href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>--}}
<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    <b class="logo-icon p-l-10">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="../../assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" />

                        </span>
                    <!-- Logo icon -->
                    <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                    <!-- </b> -->
                    <!--End Logo icon -->
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right ">

                    <li>
                        <a class="nav-item d-none d-md-block" href="{{ url('/logout') }}"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                    </li>
                 </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/home') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Category </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{ url('addcategory') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> List category </span></a></li>
                            <li class="sidebar-item"><a href="{{ url('addcategory/create') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> add category </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Product</span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{ url('product') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> List product</span></a></li>
                            <li class="sidebar-item"><a href="{{ url('product/create') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> add product </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">User</span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{ url('user') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> List User</span></a></li>
                            <li class="sidebar-item"><a href="{{ url('user/create') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> add User </span></a></li>
                            <li class="sidebar-item"><a href="{{ url('importExport') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Import User </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Deal</span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{ url('deals') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> List deal</span></a></li>
                            <li class="sidebar-item"><a href="{{ url('deals/create') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> add deal </span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->


        @yield('content')
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center fixed-end" style=" position: fixed;bottom: 0; width: 100%;">
            All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../../dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../../dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="../../assets/libs/flot/excanvas.js"></script>
<script src="../../assets/libs/flot/jquery.flot.js"></script>
<script src="../../assets/libs/flot/jquery.flot.pie.js"></script>
<script src="../../assets/libs/flot/jquery.flot.time.js"></script>
<script src="../../assets/libs/flot/jquery.flot.stack.js"></script>
<script src="../../assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="../../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="../../dist/js/pages/chart/chart-page-init.js"></script>

</body>
</html>
