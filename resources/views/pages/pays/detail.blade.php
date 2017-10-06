@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Pay Page</h3>

@include('partials.notif')

<button onclick="goBack()" class="btn btn-danger">Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>

<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel" style="padding: 5px;">

        @foreach ($student as $student)<!-- Menampilkan eror dengan perulangan -->
            <h4 class="mb"><i class="fa fa-angle-right"></i> Detail User</h4>
                      <div class="col-xs-12" style="padding:0px;">
                        <div class="col-xs-3 content-detail">ID USER</div>
                          <div class="col-xs-9 content-detail">{{$student->id}}</div>
                        <div class="col-xs-3 content-detail">NAME</div>
                          <div class="col-xs-9 content-detail">{{$student->name}}</div>
                        <div class="col-xs-3 content-detail">NIS</div>
                          <div class="col-xs-9 content-detail">{{$student->nis}}</div>
                        <div class="col-xs-3 content-detail">GRADE</div>
                          <div class="col-xs-9 content-detail">{{$student->grade_id}}</div>
                        <div class="col-xs-3 content-detail">GENDER</div>
                          <div class="col-xs-9 content-detail">{{$student->gender}}</div>
                        <div class="col-xs-3 content-detail">STATUS</div>
                          <div class="col-xs-9 content-detail">
                            @if($student->transactions()->sum('pay') == Callprice())
                              <span class="badge bg-theme03">Complete</span>
                            @else
                              <span class="badge bg-theme04">Not Complete</span>
                            @endif
                          </div>
                      </div>
        @endforeach
        	<div class="text-center">
			    &nbsp
			</div>
		</div><!-- /content-panel -->
	</div><!-- /col-lg-12 -->
</div><!-- /row -->

<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel" style="padding: 5px;">
			<h4 class="">
					<i class="fa fa-plus"></i> Student Transactions
			</h4>

			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Operator</th>
						<th class="hidden-phone">Date</th>
						<th class="hidden-phone">Price</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $transaction as $index => $transaction )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Level">{{ $transaction->users()->first()->username }}</td>
						<td data-title="Username" class="hidden-phone">{{ date("H:i:s - d/M/Y", strtotime($transaction->created_at)) }}</td>
						<td data-title="Github" class="hidden-phone">{{ $transaction->pay }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="col-md-12" style="padding: 0px;">
				<h4>Total Pay : {{ $total }}</h4>
			</div>
			<div class="text-center">
			    &nbsp
			</div>
		</div><!-- /content-panel -->
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
			@endsection