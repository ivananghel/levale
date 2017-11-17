<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('assets/img/favicon.ico')}}" rel="icon" type="image/x-icon">
    <!-- Bootstrap-->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Plugins-->
    <link href="{{asset('assets/plugins/owlcarousel/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/formstyler/css/jquery.formstyler.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/responsivetabs/css/jquery.responsivetabs.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/mmenu/jquery.mmenu.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/mmenu/jquery.mmenu.positioning.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/nouislider/nouislider.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/jscrollpane/style/jquery.jscrollpane.css')}}" rel="stylesheet">
    <!-- Styles-->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    WARNING: Respond.js doesn't work if you view the page via file://
    -->
</head>
<body>
<div class="site-wrapper">
   @yield('content')
    <div id="mobilemenu"></div>
    @include('layouts._scripts')
</div>
</body>
</html>