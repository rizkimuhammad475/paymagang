<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ url('assets/img/dollar.ico') }}" />
    <title>PAYMAGANG</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ url('assets/font-awesome/css/font-awesome.css') }}"" rel="stylesheet" />
    <link href="{{ url('assets/bootstrap/css/bootstrap-select.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('assets/lineicons/style.css')}}">  
     <link rel="stylesheet" href="{{url('assets/css/to-do.css')}}"> 
        
    <!-- Custom styles for this template -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/style-responsive.css') }}" rel="stylesheet">

    @yield('css')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>