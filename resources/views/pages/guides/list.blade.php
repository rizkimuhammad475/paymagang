@extends('partials.master')
@section('content')
	<h3><i class="fa fa-angle-right"></i> Guide Page</h3>

	@include('partials.notif')
	
	<div id="app">
        <guide></guide>
    </div>
    <script src="{{asset('js/app.js')}}"></script>

@endsection