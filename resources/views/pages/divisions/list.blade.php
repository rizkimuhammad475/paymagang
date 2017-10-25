@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Division Page</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-4">
		<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Create Division</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/division/store') }}">
                      	{{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NAME</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="division_name">
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Course</label>
                            <div class="col-sm-10">
	                            @if($data['courses']->count()-1 == null)
	                            	<a href="{{ url('admin/manage/course/') }}" class="btn btn-success" style="text-align: center;width: 100%">ADD Course</a>
	                            @else
	                            	<select name="course_id" class="form-control">
	                                  @foreach($data['courses'] as $index => $course)
	                                    @if($course->id == 1)

	                                    @else
	                                      <option value="{{$course->id}}">{{$course->course_name}}</option>
	                                    @endif
	                                  @endforeach
	                              	</select>
	                            @endif
                            </div>
                          </div>
                           <div class="form-group">
                              <div class="col-md-12">
	                          	<input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="CREATE">
	                          </div>
                          </div>              
                      </form>
		</div><!-- /content-panel -->
	</div><!-- /col-md-12 -->
	<div class="col-lg-8">
		<div class="form-panel">
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Division</th>
						<th>Course</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@if($data['divisions']->count() == null)
						<tr>
							<td colspan="4" style="text-align: center;padding: 10px;">
								<h3>There is nothing division</h3>
							</td>
						</tr>
					@else
						@foreach( $data['divisions'] as $index => $division )
							<tr>
								<td data-title="No">{{ ++$index }}</td>
								<td data-title="Category">{{ $division->division_name }}</td>
								<td data-title="Category">{{ $division->courses()->first()->course_name }}</td>
								<td class="text-center" data-title="Price">
									<a href="{{ url('admin/manage/division/edit/'.$division->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="{{ url('admin/manage/division/destroy/'.$division->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure Want To Delete This Division ? ')"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
			<!--  -->
		</div><!-- /content-panel -->
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
			@endsection