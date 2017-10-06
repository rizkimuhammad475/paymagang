@extends('partials.master')
@section('content')
	<h3><i class="fa fa-angle-right"></i> Student Status Page</h3>

	@include('partials.notif')
	
	<div id="app">
        <statstudent></statstudent>
    </div>
    <script src="{{asset('js/app.js')}}"></script>

@endsection