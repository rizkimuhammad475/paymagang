@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Operator Page</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel">
			<h4 class="">
				<a href="{{ url('admin/manage/operator/create') }}" class="btn btn-success">
					<i class="fa fa-plus"></i> ADD
				</a>
			</h4>
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Username</th>
						<th class="hidden-phone">Email</th>
						<th class="hidden-phone">Created Since</th>
						<th class="hidden-phone">Course</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['operators'] as $index => $operator )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Username">{{ $operator->username }}</td>
						<td data-title="Email" class="hidden-phone">{{ $operator->email }}</td>
						<td data-title="Created Since" class="hidden-phone">{{ $operator->created_at }}</td>
						<td data-title="Course" class="hidden-phone">{{ $operator->courses()->first()->course_name }}</td>
						<td class="text-center" data-title="Price">
							<a href="{{ url('admin/manage/operator/edit/'.$operator->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('admin/manage/operator/destroy/'.$operator->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['operators']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection