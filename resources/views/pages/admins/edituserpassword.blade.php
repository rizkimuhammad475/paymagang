@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> User Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">

      @include('partials.notif')

            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit user password</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/admin/userupdate') }}">
                        {{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">OLD PASSWORD</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="old_password" value="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NEW PASSWORD</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="new_password" value="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">CONFIRM NEW PASSWORD</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="con_new_password" value="">
                              </div>
                          </div>
                           <div class="form-group">
                              <div class="col-md-12">
                              <input type="submit" name="edituserpassword" class="btn btn-success col-md-4 col-md-offset-4" value="EDIT">
                            </div>
                          </div>              
                      </form>

                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection