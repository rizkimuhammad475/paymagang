@extends('partials.master')
@section('content')
	<h3><i class="fa fa-angle-right"></i> Pay Page</h3>

	@include('partials.notif')
	
	<div id="app">
        <pay></pay>
    </div>
    <script src="{{asset('js/app.js')}}"></script>

@endsection