@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Student Page</h3>
		<h3>
			@if(Auth::user()->role_id != 3)
			<i class="fa fa-angle-right"></i> 
			<a href="{{ url('admin/manage/grade/') }}" class="btn btn-success">
				<i class="fa fa-plus"></i> ADD Grade
			</a>
			@endif
			<a href="{{ url('admin/manage/student') }}" class="btn btn-danger">Back</a>
		</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		@foreach( $data['divisions'] as $index => $division )
		<a href="{{url('admin/manage/student/'.$division->course_id.'/'.$division->id)}}">
					<div class="col-md-4 col-sm-4 mb" style="padding:10px;border:1px solid #f4f4f4;">
			            <div class="white-panel col-md-12 pn" style="padding:30px;background-color: #ffd777;color: #fff;">
							
				            <div class="centered col-md-12" style="padding-bottom:15px;">
								<h3>{{ $division->step }} - {{ $division->division_name }}</h3>				            
							</div>
			            </div>
			        </div><!-- /col-md-4 -->
				</a>
		<!-- <a href="{{url('admin/manage/student/'.$division->course_id.'/'.$division->id)}}">
			<div class="col-md-4 col-sm-4 mb" style="padding:10px;border:1px solid #f4f4f4;">
	            <div class="white-panel col-md-12 pn" style="padding:0px;">
	                <div class="white-header col-md-12" style="background-color: #ffd777;color: #fff;">
						<h5 style="font-weight: bolder;">{{ $division->step }} - {{ $division->division_name }}</h5>
	                </div>
					<div class="row">
						<div class="col-sm-12 col-xs-12 centered">
							<p><i class="fa fa-calendar"></i>
								{{ \App\Student::where('grade_id',$division->id)->count()}} 
							</p>
						</div>
		            </div>
		            <div class="centered col-md-12" style="padding-bottom:15px;">
						<img src="{{ url('assets/img/eb.jpg') }}" style="width:100%;height:200px;" class="img-thumbnail">
		            </div>
	            </div>
	        </div><!-- /col-md-4 -->
		<!-- </a> -->
		@endforeach
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
@endsection