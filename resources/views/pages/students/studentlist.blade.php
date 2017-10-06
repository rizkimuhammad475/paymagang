@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Student Page</h3>
<a href="{{url('admin/manage/student/'.$data['courseId'])}}" class="btn btn-danger">Back</a>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-4">
		<div class="form-panel col-md-12">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Create Student</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/student/store') }}">
                      	{{ csrf_field() }} 
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" name="name" class="form-control" placeholder="NAME">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">NIS</label>
                            <div class="col-sm-10">
                              <input type="number" name="nis" class="form-control" placeholder="NIS">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Gender</label>
                            <div class="col-sm-10">
                              <select name="gender" class="form-control">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                              </select>
                            </div>
                          </div>              
                           <div class="form-group">
                              <div class="col-md-12">
                              	<input type="hidden" name="grade_id" value="{{$data['grades']->id}}">
	                          	<input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="CREATE">
	                          </div>
                          </div>              
                      </form>
		</div><!-- /content-panel -->

		<div class="form-panel col-md-12">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Import Data Student To This Grade</h4>
                      <form enctype="multipart/form-data" class="form-horizontal style-form" method="post" action="{{ url('admin/manage/student/import') }}">
                      	{{ csrf_field() }} 
                          <div class="form-group">
                          	<div class="col-md-12">
                          		<b style="color: red;">import data in xls, xlsx and csv formate file.</b>
                          	</div>
                            <label class="col-sm-4 control-label">File</label>
                            <div class="col-sm-8">
                              <input type="file" name="import_file" class="control-label" style="border-style: none;">
                            </div>
                          </div>         
                           <div class="form-group">
                              <div class="col-md-12">
                              	<input type="hidden" name="grade_id" value="{{$data['grades']->id}}">
	                          	<input type="submit" name="import" class="btn btn-success col-md-4 col-md-offset-4" value="IMPORT">
	                          </div>
                          </div>              
                      </form>
		</div><!-- /content-panel -->
	</div><!-- /col-md-12 -->
	<div class="col-lg-8">
		<div class="form-panel">
			<h4 class="mb"><i class="fa fa-angle-right"></i>
                {{$data['grades']->steps()->first()->step}} {{$data['grades']->divisions()->first()->division_name}}
            </h4>

            <div class="btn-group col-md-12 mb" style="padding: 0px;">
			  <a href="{{ url('admin/manage/student/export/'.$data['grades']->id.'/xlsx') }}" class="btn btn-primary col-md-4">Export xlsx</a>
			  <a href="{{ url('admin/manage/student/export/'.$data['grades']->id.'/xls') }}" class="btn btn-primary col-md-4">Export xls</a>
			  <a href="{{ url('admin/manage/student/export/'.$data['grades']->id.'/csv') }}" class="btn btn-primary col-md-4">Export csv</a>
			</div>

			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Name</th>
						<th class="hidden-phone">Gender</th>
						<th>Nis</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['students'] as $index => $student )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Category">{{ $student->name }}</td>
						<td data-title="Category" class="hidden-phone">{{ $student->gender }}</td>
						<td data-title="Category">{{ $student->nis }}</td>
						<td class="text-center" data-title="Price">
							<a href="{{ url('admin/manage/student/'.$data['courseId'].'/'.$data['gradeId'].'/edit/'.$student->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('admin/manage/student/'.$data['courseId'].'/'.$data['gradeId'].'/destroy/'.$student->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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