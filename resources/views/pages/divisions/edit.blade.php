@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Division Page</h3>
<div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
    @if ($errors->any())<!-- Percabngan jika ada inputan yang salah -->
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)<!-- Menampilkan eror dengan perulangan -->
                        <li>{{ $error }}</li><!-- Menampilkan bagian eror -->
                    @endforeach
                </ul>
            </div>
        @endif

        @foreach ($division as $division)<!-- Menampilkan eror dengan perulangan -->
            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Division</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/division/update/'.$division->id) }}">
                        {{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NAME</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="division_name" value="{{$division->division_name}}">
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Course</label>
                            <div class="col-sm-10">
                              <select name="course_id" class="form-control">
                                  @foreach($course as $index => $course)
                                    @if($course->id == 1)
                                    
                                    @elseif($course->id == $division->course_id)
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