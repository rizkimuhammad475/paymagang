@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Student Page</h3>
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

        @foreach ($edit['data'] as $change)<!-- Menampilkan eror dengan perulangan -->
            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Student</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/student/'.$edit['courseId'].'/'.$edit['gradeId'].'/update/'.$change->id) }}">
                        {{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="{{$change->name}}">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NIS</label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" name="nis" value="{{$change->nis}}">
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Gender</label>
                            <div class="col-sm-10">
                              <select name="gender" class="form-control">
                              @if($change->gender == 'laki-laki')
                                <option value="laki-laki" selected="selected">Laki-Laki</option>
                              @else
                                <option value="laki-laki">Laki-Laki</option>
                              @endif
                               @if($change->gender == 'perempuan')
                                <option value="perempuan" selected="selected">Perempuan</option>
                              @else
                                <option value="perempuan">Perempuan</option>
                              @endif
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