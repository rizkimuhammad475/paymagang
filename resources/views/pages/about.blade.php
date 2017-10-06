@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> About Us</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel">

			<div class="col-md-12">
				<h2 class="text-center">ABOUT SOFTWARE</h2>
				<p class="text-center">

					The software was created in 2017 because it is difficult to manually perform processing and manipulation of data when making internship payments,<br>
					this software is created with the purpose to facilitate us to process and manage the data when we are making an internship payment.
				</p>
			</div>

			<div class="col-md-12" style="text-align: center;">
				<h2 class="text-center">Powered By</h2>
				<div class="col-md-4">
					<h4>Front End Framework</h4>
					<img class="img img-circle" src="{{ url('assets/img/vue.png') }}" style="width: 100px;height: auto;">
					<p style="margin: 20px 0px;">Vue Js Version 2.0</p>
				</div>
				<div class="col-md-4">
					<h4>Admin Template</h4>
					<img class="img img-circle" src="{{ url('assets/img/ui-sam.jpg') }}" style="width: 100px;height: auto;">
					<p style="margin: 20px 0px;">Bootstarp Dashgum Admin Template</p>
				</div>
				<div class="col-md-4">
					<h4>Back End Framework</h4>
					<img class="img img-circle" src="{{ url('assets/img/lv54.png') }}" style="width: 100px;height: auto;">
					<p style="margin: 20px 0px;">Laravel Version 5.4</p>
				</div>
			</div>

			<div class="col-md-12" style="text-align: center;">
				<h2 class="text-center">More Info</h2>
				<div class="col-md-3">
					<h4>Phone</h4>
					<img class="img img-circle" src="{{ url('assets/img/info/phone.png') }}" style="width: 100px;height: auto;">
					<p style="margin: 20px 0px;">089664671785</p>
				</div>
				<div class="col-md-3">
					<h4>Address</h4>
					<img class="img img-circle" src="{{ url('assets/img/info/address.png') }}" style="width: 100px;height: auto;">
					<p style="margin: 20px 0px;">Jl.kali baru utara no.157</p>
				</div>
				<div class="col-md-3">
					<h4>Email</h4>
					<img class="img img-circle" src="{{ url('assets/img/info/gmail.png') }}" style="width: 100px;height: auto;">
					<p style="margin: 20px 0px;">rizkimuhammad475@gmail.com</p>
				</div>
				<div class="col-md-3">
					<h4>Github</h4>
					<img class="img img-circle" src="{{ url('assets/img/info/github.png') }}" style="width: 100px;height: auto;">
					<p style="margin: 20px 0px;">rizkimuhammad475</p>
				</div>
			</div>
			<div class="text-center">
				  - PAYMAGANG -
			</div>
		</div><!-- /content-panel -->
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
@endsection