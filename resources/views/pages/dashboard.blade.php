@extends('partials.master')

@section('content')

<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

              		<div class="row">
	                  <div class="col-lg-12 main-chart">

	                  @include('partials.notif')
	                  	<div class="col-md-12 alert alert-warning">
	              			<span>Please read the guides before you use this program</span>
	              		</div>
	                  	@if(\Auth::user()->role_id != 3)
							<div class="row mtbox">
		                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
		                  			<div class="box1">
							  			<span class="li_mail"></span>
							  			<h3>{{$data['feedbacks']}}</h3>
		                  			</div>
							  			<p>
							  			Hy {{\Auth::user()->username}}<br>
							  			We have {{$data['feedbacks']}} feedbacks for now
							  			</p>
		                  		</div>
		                  		<div class="col-md-2 col-sm-2 box0">
		                  			<div class="box1">
							  			<span class="li_pen"></span>
							  			<h3>{{$data['transactions']}}</h3>
		                  			</div>
							  			<p>
							  			Hy {{\Auth::user()->username}}<br>
							  			We have {{$data['transactions']}} transactions for now
							  			</p>
		                  		</div>
		                  		<div class="col-md-2 col-sm-2 box0">
		                  			<div class="box1">
							  			<span class="li_user"></span>
							  			<h3>{{$data['students']}}</h3>
		                  			</div>
							  			<p>
							  			Hy {{\Auth::user()->username}}<br>
							  			We have {{$data['students']}} students for now
							  			</p>
		                  		</div>
		                  		<div class="col-md-2 col-sm-2 box0">
		                  			<div class="box1">
							  			<span class="li_banknote"></span>
							  			<h3>{{Callprice()}}</h3>
		                  			</div>
							  			<p>
							  			Hy {{\Auth::user()->username}}<br>
							  			The current price for internship payment is {{Callprice()}}
							  			</p>
		                  		</div>
		                  		<div class="col-md-2 col-sm-2 box0">
		                  			<div class="box1">
							  			<span class="li_eye"></span>
							  			<h3>{{$data['users']}}</h3>
		                  			</div>
							  			<p>
							  			Hy {{\Auth::user()->username}}<br>
							  			We have {{$data['users']}} users for now
							  			</p>
		                  		</div>
		                  	
		                  	</div><!-- /row mt -->
	                  	@endif	
	                  
	                      
	                      <div class="row mt">
	                      <!-- SERVER STATUS PANELS -->
	                      	@foreach($data['superadmins'] as $dsa)
	                      	<div class="col-md-4 mb">
								<!-- WHITE PANEL - TOP USER -->
								<div class="white-panel pn">
									<div class="white-header">
										<h5>SUPER ADMIN</h5>
									</div>
									<p><img src="{{ url('assets/img/roles/1.png') }}" class="img-circle" width="80"></p>
									<p><b>{{$dsa->username}}</b></p>
									<div class="row">
										<div class="col-md-12">
											<p class="small mt">MEMBER SINCE</p>
											<p>{{$dsa->created_at}}</p>
										</div>
									</div>
								</div>
							</div><!-- /col-md-4 -->
							@endforeach
	                      	

	                      	@if(count($data['admins']) > 0)
								@foreach($data['admins'] as $da)
									<div class="col-md-4 mb">
										<!-- WHITE PANEL - TOP USER -->
										<div class="white-panel pn">
											<div class="white-header">
												<h5>TOP ADMIN</h5>
											</div>
											<p><img src="{{ url('assets/img/roles/2.png') }}" class="img-circle" width="80"></p>
											<p><b>{{$da->username}}</b></p>
											<div class="row">
												<div class="col-md-6">
													<p class="small mt">MEMBER SINCE</p>
													<p>{{$da->created_at}}</p>
												</div>
												<div class="col-md-6">
													<p class="small mt">TOTAL SERVICE</p>
													<p>{{$da->serve}}</p>
												</div>
											</div>
										</div>
									</div><!-- /col-md-4 -->
		                      	@endforeach
	                      	@endif
	                      	
							@if(count($data['operators']) > 0)
								@foreach($data['operators'] as $do)
									<div class="col-md-4 mb">
										<!-- WHITE PANEL - TOP USER -->
										<div class="white-panel pn">
											<div class="white-header">
												<h5>TOP OPERATOR</h5>
											</div>
											<p><img src="{{ url('assets/img/roles/3.png') }}" class="img-circle" width="80"></p>
											<p><b>{{$do->username}}</b></p>
											<div class="row">
												<div class="col-md-6">
													<p class="small mt">MEMBER SINCE</p>
													<p>{{$do->created_at}}</p>
												</div>
												<div class="col-md-6">
													<p class="small mt">TOTAL SERVICE</p>
													<p>{{$do->serve}}</p>
												</div>
											</div>
										</div>
									</div><!-- /col-md-4 -->
		                      	@endforeach
	                      	@endif
                      	

                    </div><!-- /row -->
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
@endsection