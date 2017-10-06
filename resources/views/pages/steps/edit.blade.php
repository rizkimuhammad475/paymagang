@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Step Page</h3>
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

        @foreach ($step as $step)<!-- Menampilkan eror dengan perulangan -->
            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Step</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/step/update/'.$step->id) }}">
                        {{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NAME</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="step" value="{{$step->step}}">
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