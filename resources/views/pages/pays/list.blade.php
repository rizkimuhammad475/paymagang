@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Pay Page</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Search Student</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/student/store') }}">
                      	{{ csrf_field() }} 
                          <div class="form-group" style="text-align: center;">
                          	<div class="col-md-4">
                              <select name="course_id" class="form-control">
                                  @foreach($data['grades'] as $index => $grade)
                                   
                                      <option value="{{$grade->id}}">{{$grade->step}} {{$grade->division_name}}</option>

                                  @endforeach
                              </select>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="name" class="form-control" placeholder="Search">
                            </div>
                          </div>           
                      </form>
		</div><!-- /content-panel -->
	</div><!-- /col-md-12 -->
	<div class="col-lg-12">
		<div class="form-panel">
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>Name</th>
						<th>Gender</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['students'] as $index => $student )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Category">{{ $student->nis }}</td>
						<td data-title="Category">{{ $student->name }}</td>
						<td data-title="Category">{{ $student->gender }}</td>
						<td class="text-center" data-title="Price">
							<a href="{{ url('admin/manage/student/edit/'.$student->id) }}" class="btn btn-success btn-xs"><i class="fa fa-money"></i></a>
							<a href="{{ url('admin/manage/student/destroy/'.$student->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i></a>
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