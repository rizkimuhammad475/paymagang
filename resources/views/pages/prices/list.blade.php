@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Price Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">
		
		@include('partials.notif')

            @if($prices['row'] >= 1)
            	@foreach ($prices['data'] as $price)<!-- Menampilkan eror dengan perulangan -->
				<h4 class="mb"><i class="fa fa-angle-right"></i> Edit Price</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/price/update') }}">
                        {{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Current Price</label>
                              <div class="col-sm-10">
                                  <label class="control-label">{{Callprice()}}</label>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Price</label>
                              <div class="col-sm-10">
                                  <input type="number" name="price" class="form-control">
                              </div>
                          </div>
                           <div class="form-group">
                              <div class="col-md-12">
                              <input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="EDIT">
                            </div>
                          </div>              
                      </form>
                @endforeach
            @else
				<h4 class="mb"><i class="fa fa-angle-right"></i> Declare Price</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/price/store') }}">
                        {{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Price</label>
                              <div class="col-sm-10">
                                  <input type="number" name="price" class="form-control">
                              </div>
                          </div>
                           <div class="form-group">
                              <div class="col-md-12">
                              <input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="DECLARE">
                            </div>
                          </div>              
                      </form>
            @endif
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection