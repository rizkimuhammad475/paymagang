@extends('partials.master')
@section('content')
	<h3><i class="fa fa-angle-right"></i> Transaction Page</h3>

	@include('partials.notif')
	
	<div id="app">
        <transaction></transaction>
    </div>
    <script src="{{asset('js/app.js')}}"></script>

@endsection