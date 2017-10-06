@extends('pages.interface.template')
@section('body')
<div class="col-md-6 col-md-offset-3" style="padding:10px;margin-top:200px;text-align: center;">
			<div class="col-md-12" style="background-color:#eee;padding:0px;box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2);">
			<div class="col-md-12 brand-list" align="center">
				Choose The Schedule From This Film
			</div>
				@if($ticket['lists']->count() == 0)
					<div class="col-md-12" style="padding:20px;font-size:30px;" align="center">
						Upss There Is No Tickets
					</div>
				@else
								<div class="col-md-12 sub-list" style="padding:10px;border-radius:0px;">
							  		<div class="col-md-5" style="padding:5px;">
								  		<span>Start - Expired</span>
								  	</div>
								  	<div class="col-md-5" style="padding:5px;">
								  		<span>Play - End</span>
								  	</div>
								  	<div class="col-md-2" align="center">
								  		Action
								  	</div>
							  	</div>
					@foreach($ticket['lists'] as $index => $list)
						@if($list->expired_at <= date('Y-m-d'))
								<div class="col-md-12 sub-list" style="padding:10px;border-radius:0px;">
							  		<div class="col-md-5" style="padding:5px;">
								  		<span>{{$list->start_at}} - {{$list->expired_at}}</span>
								  	</div>
								  	<div class="col-md-5" style="padding:5px;">
								  		<span>{{$list->play_at}} - {{$list->end_at}}</span>
								  	</div>
								  	<div class="col-md-2" align="center">
								  		<a class="btn btn-danger btn-sm disabled" href="{{url('user/serve')}}?start_at={{$list->start_at}}&expired_at={{$list->expired_at}}&play_at={{$list->play_at}}&end_at={{$list->end_at}}&film_id={{$list->film_id}}">Expired</a>
								  	</div>
							  	</div>
						@else
							@if($list->start_at > date('Y-m-d'))
								<div class="col-md-12 sub-list" style="padding:10px;border-radius:0px;">
							  		<div class="col-md-5" style="padding:5px;">
								  		<span>{{$list->start_at}} - {{$list->expired_at}}</span>
								  	</div>
								  	<div class="col-md-5" style="padding:5px;">
								  		<span>{{$list->play_at}} - {{$list->end_at}}</span>
								  	</div>
								  	<div class="col-md-2" align="center">
								  		<a class="btn btn-warning btn-sm" href="{{url('user/serve')}}?start_at={{$list->start_at}}&expired_at={{$list->expired_at}}&play_at={{$list->play_at}}&end_at={{$list->end_at}}&film_id={{$list->film_id}}">Booking</a>
								  	</div>
							  	</div>
							@elseif($list->start_at == date('Y-m-d'))
								@if($list->end_at <= date('H:i:s'))
									<div class="col-md-12 sub-list" style="padding:10px;border-radius:0px;">
								  		<div class="col-md-5" style="padding:5px;">
									  		<span>{{$list->start_at}} - {{$list->expired_at}}</span>
									  	</div>
									  	<div class="col-md-5" style="padding:5px;">
									  		<span>{{$list->play_at}} - {{$list->end_at}}</span>
									  	</div>
									  	<div class="col-md-2" align="center">
									  		<a class="btn btn-danger btn-sm disabled" href="{{url('user/serve')}}?start_at={{$list->start_at}}&expired_at={{$list->expired_at}}&play_at={{$list->play_at}}&end_at={{$list->end_at}}&film_id={{$list->film_id}}">Expired</a>
									  	</div>
								  	</div>
								@else
									<div class="col-md-12 sub-list" style="padding:10px;border-radius:0px;">
								  		<div class="col-md-5" style="padding:5px;">
									  		<span>{{$list->start_at}} - {{$list->expired_at}}</span>
									  	</div>
									  	<div class="col-md-5" style="padding:5px;">
									  		<span>{{$list->play_at}} - {{$list->end_at}}</span>
									  	</div>
									  	<div class="col-md-2" align="center">
									  		<a class="btn btn-warning btn-sm" href="{{url('user/serve')}}?start_at={{$list->start_at}}&expired_at={{$list->expired_at}}&play_at={{$list->play_at}}&end_at={{$list->end_at}}&film_id={{$list->film_id}}">Booking</a>
									  	</div>
								  	</div>
								@endif
							@else
								<div class="col-md-12 sub-list" style="padding:10px;border-radius:0px;">
							  		<div class="col-md-5" style="padding:5px;">
								  		<span>{{$list->start_at}} - {{$list->expired_at}}</span>
								  	</div>
								  	<div class="col-md-5" style="padding:5px;">
								  		<span>{{$list->play_at}} - {{$list->end_at}}</span>
								  	</div>
								  	<div class="col-md-2" align="center">
								  		<a class="btn btn-danger btn-sm disabled" href="{{url('user/serve')}}?start_at={{$list->start_at}}&expired_at={{$list->expired_at}}&play_at={{$list->play_at}}&end_at={{$list->end_at}}&film_id={{$list->film_id}}">Expired</a>
								  	</div>
							  	</div>
							@endif
						@endif
					  	
					@endforeach
				@endif
			</div>
			</div>
@endsection