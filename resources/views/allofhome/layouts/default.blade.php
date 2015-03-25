<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>
            @section('title')
                {{ Config::get('allofhome.title') }}
            @show
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="">
        <meta name="description" content="">

        <link href="{{ asset('js/lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('js/lib/bootstrap/dist/css/bootstrap-theme.min.css') }}" rel="stylesheet">
        <link href="{{ asset('js/lib/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/allofhome.css') }}" rel="stylesheet">

        @section('style_link')
        @show

        <style>
        @section('styles')

        @show
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src={{ asset('js/lib/html5shiv/dest/html5shiv.min.js') }}></script>
            <script src={{ asset('js/lib/responsejs/response.min.js') }}></script>
        <![endif]-->

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    </head>

    <body>
        @section('body')
        @show

        <!--[if lt IE 8]>
        <p>You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
        <![endif]-->

        <!-- Navigation Bar -->
        
        <!-- // Navigation Bar -->

        <!-- Container -->
        <div class="container-fluid" id="main-container">
            <!-- Content -->
            @yield('content')
            <!-- // content -->
        </div>
        <!-- // container -->

        <!-- Footer -->
        
        <!-- // Footer -->

        <!-- Javascripts
        ================================================== -->
        <script src={{ asset('js/lib/jquery/dist/jquery.min.js') }}></script>
        <script src={{ asset('js/lib/bootstrap/dist/js/bootstrap.min.js') }}></script>

        @section('script')
        @show

    </body>
</html>