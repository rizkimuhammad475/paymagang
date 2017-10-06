@extends('pages.interface.template')
@section('body')

	<div class="col-md-12" style="padding: 0px;">
		<div class="col-md-3" style="padding: 10px;">

			<div class="col-md-12" style="padding: 5px;margin: 5px 0px;background-color: #fff;text-align: center;">
			<div class="col-md-12" style="background-color: #eee;padding: 3px;">Detail</div>
				
					<div class="col-md-6" align="center" style="padding: 5px;">Film</div>
					<div class="col-md-6" align="center" style="padding: 5px;">{{$ticket['lists']->first()->films()->first()->film_tittle}}</div>
					<div class="col-md-6" align="center" style="padding: 5px;">Price</div>
					<div class="col-md-6" align="center" style="padding: 5px;">{{$ticket['lists']->first()->price}}</div>
					<div class="col-md-6" align="center" style="padding: 5px;">Studio</div>
					<div class="col-md-6" align="center" style="padding: 5px;">{{$ticket['lists']->first()->studio_id}}</div>
					<div class="col-md-6" align="center" style="padding: 5px;">Start</div>
					<div class="col-md-6" align="center" style="padding: 5px;">{{$ticket['lists']->first()->start_at}}</div>
					<div class="col-md-6" align="center" style="padding: 5px;">Expired</div>
					<div class="col-md-6" align="center" style="padding: 5px;">{{$ticket['lists']->first()->expired_at}}</div>
					<div class="col-md-6" align="center" style="padding: 5px;">Play</div>
					<div class="col-md-6" align="center" style="padding: 5px;">{{$ticket['lists']->first()->play_at}}</div>
					<div class="col-md-6" align="center" style="padding: 5px;">End</div>
					<div class="col-md-6" align="center" style="padding: 5px;">{{$ticket['lists']->first()->end_at}}</div>
				
			</div>

			<div class="col-md-12" style="padding: 5px;margin: 5px 0px;background-color: #fff;text-align: center;">
			<div class="col-md-12">Total Price</div>
			<div class="col-md-12">{{$ticket['chart']}}</div>
			</div>

			@if($ticket['chart'] != 0)
				<a href="{{url('user/checkout')}}" class="btn btn-success" style="padding: 5px;margin: 5px 0px;text-align: center;width: 100%;">Check</a>
			@else

			@endif

			<div class="col-md-12" style="padding: 5px;margin: 5px 0px;background-color: #fff;text-align: center;">
			<div class="col-md-12">Available Tickets</div>
			<div class="col-md-12">{{$ticket['lists']->where('status',0)->count()}}</div>
			</div>

			<div class="col-md-12" style="padding: 5px;padding-top: 10px;margin: 5px 0px;background-color: #fff;text-align: center;">
			<button class="btn btn-default col-md-2">AS</button>  <div class="col-md-10" align="center" style="padding: 10px;">Available Seat</div>
			</div>

			<div class="col-md-12" style="padding: 5px;padding-top: 10px;margin: 5px 0px;background-color: #fff;text-align: center;">
			<button class="btn btn-danger col-md-2">S</button>  <div class="col-md-10" align="center" style="padding: 10px;">Sold</div>
			</div>

			<div class="col-md-12" style="padding: 5px;padding-top: 10px;margin: 5px 0px;background-color: #fff;text-align: center;">
			<button class="btn btn-success col-md-2">CS</button>  <div class="col-md-10" align="center" style="padding: 10px;">Current Selected</div>
			</div>
		</div>
		<div class="col-md-9" style="padding: 10px;text-align: center;">
			<div class="col-md-12" align="center">
				<div class="col-md-11">
					<div class="col-md-4 col-md-offset-4" style="text-align: center;">
						<div class="btn-group btn-group-justified">
						  	<a href="{{url('user/clear')}}" class="btn btn-danger">Clear</a>
						  	<a href="{{url('user/abort')}}" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
			@foreach($ticket['lists'] as $index => $ticket)
				@if($ticket->status != 0)
					@if($ticket->status == \Session::get('sale'))
						@if($ticket->chairs()->first()->chair_number == 10)
							<a href="{{url('user/cancel/'.$ticket->play_at.'/'.$ticket->end_at.'/'.$ticket->start_at.'/'.$ticket->expired_at.'/'.$ticket->price.'/'.$ticket->id.'/'.$ticket->film_id.'/'.$ticket->studio_id.'/'.$ticket->row_id.'/'.$ticket->chair_id.'')}}" class="col-md-1 btn btn-success btn-custom" onclick="return confirm('Are You Sure Want To Cancel This Ticket ? ')">{{$ticket->rows()->first()->row_name}} - {{$ticket->chairs()->first()->chair_number}}</a>
							<div class="col-md-1" align="center" style="padding: 15px;">{{$ticket->rows()->first()->row_name}}</div>
						@elseif($ticket->chairs()->first()->chair_number == 5)
							<a href="{{url('user/cancel/'.$ticket->play_at.'/'.$ticket->end_at.'/'.$ticket->start_at.'/'.$ticket->expired_at.'/'.$ticket->price.'/'.$ticket->id.'/'.$ticket->film_id.'/'.$ticket->studio_id.'/'.$ticket->row_id.'/'.$ticket->chair_id.'')}}" class="col-md-1 btn btn-success btn-custom" onclick="return confirm('Are You Sure Want To Cancel This Ticket ? ')">{{$ticket->rows()->first()->row_name}} - {{$ticket->chairs()->first()->chair_number}}</a>
							<div class="col-md-1" align="center" style="padding: 15px;"></div>
						@else
							<a href="{{url('user/cancel/'.$ticket->play_at.'/'.$ticket->end_at.'/'.$ticket->start_at.'/'.$ticket->expired_at.'/'.$ticket->price.'/'.$ticket->id.'/'.$ticket->film_id.'/'.$ticket->studio_id.'/'.$ticket->row_id.'/'.$ticket->chair_id.'')}}" class="col-md-1 btn btn-success btn-custom" onclick="return confirm('Are You Sure Want To Cancel This Ticket ? ')">{{$ticket->rows()->first()->row_name}} - {{$ticket->chairs()->first()->chair_number}}</a>
						@endif
					@else
						@if($ticket->chairs()->first()->chair_number == 10)
							<a data-toggle="modal" data-target="#sold" class="col-md-1 btn btn-danger btn-custom">{{$ticket->rows()->first()->row_name}} - {{$ticket->chairs()->first()->chair_number}}</a>
							<div class="col-md-1" align="center" style="padding: 15px;">{{$ticket->rows()->first()->row_name}}</div>
						@elseif($ticket->chairs()->first()->chair_number == 5)
							<a data-toggle="modal" data-target="#sold" class="col-md-1 btn btn-danger btn-custom">{{$ticket->rows()->first()->row_name}} - {{$ticket->chairs()->first()->chair_number}}</a>
							<div class="col-md-1" align="center" style="padding: 15px;"></div>
						@else
							<a data-toggle="modal" data-target="#sold" class="col-md-1 btn btn-danger btn-custom">{{$ticket->rows()->first()->row_name}} - {{$ticket->chairs()->first()->chair_number}}</a>
						@endif
					@endif
				@else
					@if($ticket->chairs()->first()->chair_number == 10)
						<a href="{{url('user/buy/'.$ticket->play_at.'/'.$ticket->end_at.'/'.$ticket->start_at.'/'.$ticket->expired_at.'/'.$ticket->price.'/'.$ticket->id.'/'.$ticket->film_id.'/'.$ticket->studio_id.'/'.$ticket->row_id.'/'.$ticket->chair_id.'')}}" class="col-md-1 btn btn-default btn-custom">{{$ticket->rows()->first()->row_name}} - {{$ticket->chairs()->first()->chair_number}}</a>
						<div class="col-md-1" align="center" style="padding: 15px;">{{$ticket->rows()->first()->row_name}}</div>
					@elseif($ticket->chairs()->first()->chair_number == 5)
						<a href="{{url('user/buy/'.$ticket->play_at.'/'.$ticket->end_at.'/'.$ticket->start_at.'/'.$ticket->expired_at.'/'.$ticket->price.'/'.$ticket->id.'/'.$ticket->film_id.'/'.$ticket->studio_id.'/'.$ticket->row_id.'/'.$ticket->chair_id.'')}}" class="col-md-1 btn btn-default btn-custom">{{$ticket->rows()->first()->row_name}} - {{$ticket->chairs()->first()->chair_number}}</a>
						<div class="col-md-1" align="center" style="padding: 15px;"></div>
					@else
						<a href="{{url('user/buy/'.$ticket->play_at.'/'.$ticket->end_at.'/'.$ticket->start_at.'/'.$ticket->expired_at.'/'.$ticket->price.'/'.$ticket->id.'/'.$ticket->film_id.'/'.$ticket->studio_id.'/'.$ticket->row_id.'/'.$ticket->chair_id.'')}}" class="col-md-1 btn btn-default btn-custom">{{$ticket->rows()->first()->row_name}} - {{$ticket->chairs()->first()->chair_number}}</a>
					@endif
				@endif			
			@endforeach
			<div class="col-md-11 stagging">
				<div style="float: left;">EXIT</div>
				<div style="float: right;">IN</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-11 screen">SCREEN PLAY</div>
			<div class="col-md-1"></div>
			<div class="modal fade" id="sold" role="dialog" style="margin-top:150px;">
				<div class="modal-dialog">			    
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Attention</h4>
				        </div>
						<div class="modal-body">
								<div>Sorry The Ticket Is Sold<br>Please Buy Another Ticket</div>
						</div>
					</div>		      
				</div>
			</div>
		</div>
	</div>

@endsection