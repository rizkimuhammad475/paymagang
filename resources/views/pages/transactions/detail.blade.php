@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Transaction Page</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel">

			<h4 class="">
			<i class="fa fa-angle-right"></i> Transactions Details
			</h4>
			@if($data['sale_details']->count() == 0)
				<div align="center"><h1>Ups There Is No Ticket Sales</h1></div>
			@else
			<table class="table table-bordered" style="text-align: center;">
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
					@foreach( $data['sale_details'] as $index => $sale )
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
						<button onclick="goBack()" class="btn btn-danger">Back</button>
                        <script>
                          function goBack() {
                              window.history.back();
                          }
                        </script>			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection