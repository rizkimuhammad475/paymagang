@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Feedback Page</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">

			<h4 class="">
			<i class="fa fa-plus"></i> Send Feedback
			</h4>
			<form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/feedback/store') }}">
                      	{{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 control-label">Feedback Text</label>
                              <div class="col-sm-10">
                                  <textarea name="ftext" class="form-control"></textarea>
                              </div>
                          </div>
                           <div class="form-group">
                              <div class="col-md-12">
	                          	<input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="CREATE">
	                          </div>
                          </div>              
                      </form>
			<div class="text-center">
				 
			</div>
		</div><!-- /content-panel -->
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
			@endsection