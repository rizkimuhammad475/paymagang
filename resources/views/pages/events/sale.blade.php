@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Ticket Sale Page</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel">

			<div class="col-md-12">
				<h4 class="">
			<i class="fa fa-angle-right"></i> Ticket Sales
			</h4>
			<h4 class="">
			<i class="fa fa-angle-right"> Total Ticket : </i> {{$data['sale_count']}}
			</h4>
			<h4 class="">
			<i class="fa fa-angle-right"></i> Total Sale : {{$data['sales']->sum('price')}}
			</h4>
			</div>
			<div class="col-md-12">
				<form action="{{ url('admin/manage/ticketsale/search') }}" class="form-inline col-md-12" style="padding: 5px;text-align: center;" method="post">
				{{csrf_field()}}
					<div class="btn btn-group col-md-1" style="padding: 5px 0px;text-align: center;" align="center">
						<input type="submit" name="search" value="Search" class="btn btn-primary col-md-12">
					</div>
					<div class="col-md-5" style="padding: 5px 0px;">
						<label for="" class=" col-md-2" style="padding: 10px 0px;">Between</label>
						<input type="date" name="start_at" class="form-control col-md-5" placeholder="example 2000-01-17">
						<input type="date" name="expired_at" class="form-control col-md-5" placeholder="example 2000-01-17">
					</div>
					<div class="col-md-5" style="padding: 5px 0px;">
						<label for="" class="col-md-2" style="padding: 10px 0px;">Film</label>
						<select name="film_tittle" class="form-control col-md-10">
							<option value="" selected="TRUE"></option>
							@foreach($data['films'] as $film)
								<option value="{{$film->id}}">{{$film->film_tittle}}</option>
							@endforeach
						</select>
					</div>
					<a href="{{ url('admin/manage/ticketsale/destroy') }}" class="btn btn-danger col-md-1" onclick="return confirm('Are You Sure Want To Delete All Data ? ')" style="margin: 5px 0px;">Clear All</a>
				</form>
			</div>
			@if($data['sales']->count() == 0)
				<div align="center"><h1>Ups There Is No Ticket Sales</h1></div>
			@else
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Film</th>
						<th>Row</th>
						<th>Chair</th>
						<th class="hidden-phone">Price</th>
						<th class="hidden-phone">Play At</th>
						<th class="hidden-phone">End At</th>
						<th class="hidden-phone">Start At</th>
						<th class="hidden-phone">Expired At</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['sales'] as $index => $sale )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Film">{{ $sale->films()->first()->film_tittle }}</td>
						<td data-title="row">{{ $sale->rows()->first()->row_name }}</td>
						<td data-title="chair">{{ $sale->chairs()->first()->chair_number }}</td>
						<td data-title="price" class="hidden-phone">{{ $sale->price }}</td>
						<td data-title="play" class="hidden-phone">{{ $sale->play_at }}</td>
						<td data-title="end" class="hidden-phone">{{ $sale->end_at }}</td>
						<td data-title="start" class="hidden-phone">{{ $sale->start_at }}</td>
						<td data-title="expired" class="hidden-phone">{{ $sale->expired_at }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
			<div class="text-center">
				{{ $data['sales']->links() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection