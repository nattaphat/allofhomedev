<!DOCTYPE html>
<html lang="en">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <title>
          @section('title')
              {{ Config::get('allofhome.title') }}
          @show
      </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
      <!-- @todo: fill with your company info or remove -->
      <meta name="description" content="">
      <meta name="author" content="www.allofhome.com">
      <meta name="keywords" content="">
      <meta name="description" content="">

      <!-- Bootstrap CSS -->
      <link type="text/css" href="{{ asset('js/lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

      <!-- File input CSS -->
      <link type="text/css" href="{{ asset('js/lib/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">

      <!-- Date picker CSS -->
      <link type="text/css" href="{{ asset('js/lib/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

      <!-- Font Awesome -->
      <link type="text/css" href="{{ asset('js/lib/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    
      <!-- Bootstrap Social -->
      <link type="text/css" type="text/css" href="{{ asset('js/lib/bootstrap-social/bootstrap-social.css') }}" rel="stylesheet">
    
      <!-- Plugins required on all pages NOTE: Additional non-required plugins are loaded ondemand as of AppStrap 2.5 -->
      <!-- Plugin: animate.css (animated effects) - http://daneden.github.io/animate.css/ -->
      <link type="text/css" href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet">

      <!-- @LINEBREAK -- <!-- Plugin: flag icons - http://lipis.github.io/flag-icon-css/ -->
      <link type="text/css" href="{{ asset('plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    
      <!-- Theme style -->
      <link type="text/css" href="{{ asset('css/theme-style.min.css') }}" rel="stylesheet">
    
      <!--Your custom colour override-->
      <link type="text/css" href="#" id="colour-scheme" rel="stylesheet">
    
      <!-- Your custom override -->
      <link type="text/css" href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
    
      <!-- HTML5 shiv & respond.js for IE6-8 support of HTML5 elements & media queries -->
      <!--[if lt IE 9]>
            <script src="plugins/html5shiv/dist/html5shiv.js"></script>
            <script src="plugins/respond/respond.min.js"></script>
      <![endif]-->
    
      <!-- Le fav and touch icons - @todo: fill with your icons or remove -->
      <!--<link rel="shortcut icon" href="{{ asset('img/icons/favicon.png') }}"> -->
      <link rel="shortcut icon" href="{{ asset('img/logo.ico') }}">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('img/icons/114x114.png') }}">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('img/icons/72x72.png') }}">
      <link rel="apple-touch-icon-precomposed" href="{{ asset('img/icons/default.png') }}">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Rambla' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
    
      <!--Plugin: Retina.js (high def image replacement) - @see: http://retinajs.com/-->
      <script src="{{ asset('plugins/retina/dist/retina.min.js') }}"></script>
  </head>
  
  <!-- ======== @Region: body ======== -->
  @section('body')
        <body class="page page-index">
  @show
    
            <a href="#content" class="sr-only">Skip to content</a>
    
            <!-- ======== @Region: #navigation ======== -->
            <div id="navigation" class="wrapper">
            <div class="navbar-static-top">
        
            <!--Hidden Header Region-->
            <div class="header-hidden">
                @include('layouts._partials.header_hidden_container')
            </div>
        
            <!--Header upper region-->
            <div class="header-upper">
                <div class="header-upper-inner container">
                    @include('layouts._partials.header_upper')
                </div>
            </div>
      
            <!--Header search region - hidden by default -->
            <div class="header-search">
                @include('layouts._partials.header_search')
            </div>
      
            <!--Header & Branding region-->
            <div class="header" data-toggle="clingify">
                <div class="header-inner container">
                    <div class="navbar">
                        <div class="pull-left">
                            <!--branding/logo-->
                            <a class="navbar-brand" href="{{ URL::to('/') }}" title="Home">
                                <h1>
                                    <!-- <span>AllOf</span>Home<span>.</span> -->
                                    <img src="img/logo_v2.png">
                                </h1>
                            </a>
                            <div class="slogan">ทุกเรื่องบ้านที่ ออล ออฟ โฮม</div>
                        </div>
            
                        <!--Search trigger -->
                        <a href="#search" class="search-form-tigger"
                            data-toggle="search-form" data-target=".header-search">
                            </span>
                            <i class="fa fa-search fa-flip-horizontal search-icon"></i>
                        </a>
          
                        <!-- mobile collapse menu button - data-toggle="toggle" = default BS menu - data-toggle="jpanel-menu" = jPanel Menu -->
                        <a href="#top" class="navbar-btn"
                            data-toggle="jpanel-menu"
                            data-target=".navbar-collapse"
                            data-direction="right"><i class="fa fa-bars"></i>
                        </a>
          
                        <!--everything within this div is collapsed on mobile-->
                        <div class="navbar-collapse collapse">
                        <!--main navigation-->
                            @include('layouts._partials.main_menu')
                    </div>
                <!--/.navbar-collapse -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    @yield('slider')
</div>

<!-- ======== @Region: #content ======== -->
<div id="content">
    @yield('content')
</div>

<!-- ======== @Region: #content-below ======== -->
<div id="content-below" class="wrapper">
    @include('layouts._partials.content_below')
</div>

<!-- FOOTER -->

<!-- ======== @Region: #footer ======== -->
@include('layouts._partials.footer')

<!--Hidden elements - excluded from jPanel Menu on mobile-->
<div class="hidden-elements jpanel-menu-exclude">
  <!--@modal - signup modal-->
    @include('layouts._partials.modal_signup')
  <!-- /.modal -->
  
  <!--@modal - login modal-->
    @include('layouts._partials.modal_login')
  <!-- /.modal -->
</div>


        <!--Scripts -->
        <script src={{ asset('js/lib/jquery/dist/jquery.min.js') }}></script>

        <!-- File input JS -->
        <script src={{ asset('js/lib/bootstrap-fileinput/js/fileinput.min.js') }}></script>

        <!-- Datepicker JS -->
        <script src={{ asset('js/lib/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}></script>

        <!-- Bootstrap JS -->
        <script src={{ asset('js/lib/bootstrap/dist/js/bootstrap.min.js') }}></script>

        <!-- JS plugins required on all pages NOTE: Additional non-required plugins are loaded ondemand as of AppStrap 2.5 -->

        <!--Custom scripts mainly used to trigger libraries/plugins -->
        <script src={{ asset('js/script.min.js') }}></script>

        <!--Custom scripts for allofhome -->
        <script src={{ asset('js/allofhome.js') }}></script>
        @yield('jsbody')
    </body>
</html>