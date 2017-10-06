@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Grade Page</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-4">
		<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Create Grade</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/grade/store') }}">
                      	{{ csrf_field() }} 
                                                    <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Step</label>
                            <div class="col-sm-10">
                              <select name="step_id" class="form-control">
                                  @foreach($data['steps'] as $index => $step)
                                    
                                      <option value="{{$step->id}}">{{$step->step}}</option>

                                  @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Division</label>
                            <div class="col-sm-10">
                              <select name="division_id" class="form-control">
                                  @foreach($data['divisions'] as $index => $division)
                                   
                                      <option value="{{$division->id}}">{{$division->division_name}}</option>

                                  @endforeach
                              </select>
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
						<th>Step</th>
						<th>Division</th>
						<th>Course</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['grades'] as $index => $grade )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Category">{{ $grade->steps()->first()->step }}</td>
						<td data-title="Category">{{ $grade->divisions()->first()->division_name }}</td>
						<td data-title="Category">{{ $grade->divisions()->first()->courses()->first()->course_name }}</td>
						<td class="text-center" data-title="Price">
							<a href="{{ url('admin/manage/grade/edit/'.$grade->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('admin/manage/grade/destroy/'.$grade->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!--  -->
		</div><!-- /content-panel -->
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
			@endsection