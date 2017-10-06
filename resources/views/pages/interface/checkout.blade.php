@extends('pages.interface.template')
@section('body')

	<div class="col-md-10 col-md-offset-1" style="margin-top: 180px;box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);padding: 0px;">
		<div class="col-md-12 checkout-head" align="center">CHECKOUT</div>
		<div class="col-md-12 checkout-body">
		@include('partials.notif')
			<table class="col-md-12" style="text-align: center;">
					<tr>
						<td style="padding: 5px;">ID Sale</td>
						<td style="text-align: left;padding: 5px;">: {{\Session::get('sale')}}</td>
					</tr>
					<tr>
						<td style="padding: 5px;">Operator</td>
						<td style="text-align: left;padding: 5px;">: {{\Auth::user()->username}}</td>
					</tr>
					<tr">
						<td>No</td>
						<td>Start</td>
						<td>Expired</td>
						<td>Play</td>
						<td>End</td>
						<td>Film</td>
						<td>studio</td>
						<td>Row</td>
						<td>Chair</td>
						<td>Price</td>
					</tr>
				@foreach($checkout['list'] as $index => $list)
					<tr">
						<td style="padding: 10px;">{{++$index}}</td>
						<td style="padding: 10px;">{{$list->start_at}}</td>
						<td style="padding: 10px;">{{$list->expired_at}}</td>
						<td style="padding: 10px;">{{$list->play_at}}</td>
						<td style="padding: 10px;">{{$list->end_at}}</td>
						<td style="padding: 10px;">{{$list->films()->first()->film_tittle}}</td>
						<td style="padding: 10px;">{{$list->studios()->first()->studio_number}}</td>
						<td style="padding: 10px;">{{$list->rows()->first()->row_name}}</td>
						<td style="padding: 10px;">{{$list->chairs()->first()->chair_number}}</td>
						<td style="padding: 10px;">{{$list->price}}</td>
					</tr>
				@endforeach
					<tr>
						<td style="padding: 5px;">Total</td>
						<td style="text-align: left;padding: 5px;">: {{$checkout['list']->sum('price')}}</td>
					</tr>
					<tr>
						<form action="{{url('user/docheckout')}}" method="post">
						{{ csrf_field() }}
						<td style="padding: 5px;">Pay</td>
						<td style="text-align: left;padding-left: 5px;"><input type="number" name="pay" class="form-control"></td>
					</tr>
			</table>
		</div>
		<div class="col-md-12 checkout-footer">
			<input type="submit" name="docheckout" value="CHECKOUT" class="btn btn-primary">
			</form>
		</div>
	</div>

@endsection