@extends('pages.interface.template')
@section('body')
	<div class="col-md-12" style="padding: 10px;">
	@foreach($chart['list'] as $index => $chart)

			<div class="col-md-3" style="padding:15px;">
				<div class="col-md-12 shadow" style="padding:0px;box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2);">
					<div class="col-md-12" style="padding:0px;">
						<div class="col-md-12 course-head">
							{{$chart->films()->first()->film_tittle}}			
						</div>
						<div class="col-md-12 course-body">
						    <div class="col-md-12" style="text-align: center;">Schedule</div><div class="col-md-12" style="text-align: center;">{{$chart->start_at}} | {{$chart->play_at}} s/d {{$chart->end_at}}</div>
						    <div class="col-md-6">Place</div><div class="col-md-6">{{$chart->studio_id}} - {{$chart->chair_id}} - {{$chart->rows->first()->row_name}}</div>
						    <div class="col-md-6">Price</div><div class="col-md-6">{{$chart->price}}</div>
						    <div class="col-md-6">ID Sale</div><div class="col-md-6">{{Session::get('sale')}}</div>
						    <div class="col-md-6">The Serve</div><div class="col-md-6">{{Auth::user()->username}}</div>
						</div>
					   	<div class="col-md-12 course-footer" style="padding:5px;">
					   		<div class="col-md-12" style="padding-bottom:5px;" align="center">
								<h4>
									<span class="label label-warning">-{{++$index}}-</span>
								</h4>
					   		</div>
					   	</div>
					</div>
				</div>
			</div>

	@endforeach
	</div>
@endsection