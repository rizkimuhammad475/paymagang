@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Student Page</h3>
	@if(Auth::user()->role_id != 3)
		<h3>
			<i class="fa fa-angle-right"></i> 
			<a href="{{ url('admin/manage/course/') }}" class="btn btn-success">
				<i class="fa fa-plus"></i> ADD Course
			</a>
		</h3>
	@endif

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		@foreach( $data['courses'] as $index => $course )
			@if($course->id == 1)

			@else
				<a href="{{url('admin/manage/student/'.$course->id)}}">
					<div class="col-md-4 col-sm-4 mb" style="padding:10px;border:1px solid #f4f4f4;">
			            <div class="white-panel col-md-12 pn" style="padding:30px;background-color: #ffd777;color: #fff;">
							
				            <div class="centered col-md-12" style="padding-bottom:15px;">
								<h2>{{ $course->course_name }}</h2>				            
							</div>
			            </div>
			        </div><!-- /col-md-4 -->
				</a>
			@endif
		@endforeach
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
@endsection