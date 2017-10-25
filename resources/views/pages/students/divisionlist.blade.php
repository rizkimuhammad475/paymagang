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
	@if(count($data['divisions']) == null)
		<div class="col-md-12" v-if="grade" style="text-align: center;padding: 10px 0px;">
            <h3>There is nothing divisions</h3>
        </div>
	@else
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
		@endforeach
	@endif
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
@endsection