@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Operator Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">

      @include('partials.notif')

        @foreach ($admin as $admin)<!-- Menampilkan eror dengan perulangan -->
            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Operator</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/operator/update/'.$admin->id) }}">
                        {{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">USERNAME</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="username" value="{{$admin->username}}">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">EMAIL</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="{{$admin->email}}">
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Course</label>
                            <div class="col-sm-10">
                              <select name="course_id" class="form-control">
                                  @foreach($datacourse as $index => $course)
                                    @if($course->id == 1)
                                    
                                    @elseif($course->id == $admin->course_id)
                                      <option value="{{$course->id}}" selected="selected">{{$course->course_name}}</option>
                                    @else
                                      <option value="{{$course->id}}">{{$course->course_name}}</option>
                                    @endif
                                  @endforeach
                              </select>
                            </div>
                          </div>

                           <div class="form-group">
                              <div class="col-md-12">
                              <input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="EDIT">
                            </div>
                          </div>              
                      </form>
        @endforeach
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection