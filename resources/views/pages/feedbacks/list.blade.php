@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Feedback Page</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel">

			<h4 class="">
			<i class="fa fa-plus"></i> Feedback Lists : {{ $data['feedbacks']->count() }}
			</h4>
			@if(\Auth::user()->role_id == 1 && $data['feedbacks']->count() != null)
			<h4>
				<span>
					<a href="{{ url('admin/manage/feedback/destroy') }}" class="btn btn-danger" onclick="return confirm('Are You Sure Want To Delete All Feedback ? ')">
						<i class="fa fa-trash-o"></i> Empty Feedbacks
					</a>
				</span>
			</h4>
			@endif
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>text</th>
						@if(Auth::user()->role_id == 1)
						<th class="text-center">Action</th>
						@else

						@endif
					</tr>
				</thead>
				<tbody>
				@if($data['feedbacks']->count() == null)
					<tr>
						<td colspan="7" style="text-align: center;padding: 10px;">
							<h3>There is nothing feedback</h3>
						</td>
					</tr>
				@else
					@foreach( $data['feedbacks'] as $index => $feedback )
						<tr>
							<td data-title="No">{{ ++$index }}</td>
							<td data-title="Category">{{ $feedback->feedback_text }}</td>
							@if(Auth::user()->role_id == 1)
							<td class="text-center" data-title="Price">
								<a href="{{ url('admin/manage/feedback/delete/'.$feedback->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure Want To Delete This Admin ? ')"><i class="fa fa-trash-o"></i></a>
							</td>
							@else

							@endif
						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['feedbacks']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection