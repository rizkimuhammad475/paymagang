@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Grade Page</h3>
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

        @foreach ($grade as $grade)<!-- Menampilkan eror dengan perulangan -->
            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Grade</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/grade/update/'.$grade->id) }}">
                        {{ csrf_field() }} 
                         <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Course</label>
                            <div class="col-sm-10">
                              <select name="step_id" class="form-control">
                                  @foreach($step as $index => $step)
                                    @if($step->id == $grade->step_id)
                                      <option value="{{$step->id}}" selected="selected">{{$step->step}}</option>
                                    @else
                                      <option value="{{$step->id}}">{{$step->step}}</option>
                                    @endif
                                  @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Course</label>
                            <div class="col-sm-10">
                              <select name="division_id" class="form-control">
                                  @foreach($division as $index => $division)
                                    @if($division->id == $grade->division_id)
                                      <option value="{{$division->id}}" selected="selected">{{$division->division_name}}</option>
                                    @else
                                      <option value="{{$division->id}}">{{$division->division_name}}</option>
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