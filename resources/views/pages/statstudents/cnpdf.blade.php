<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Document</title>

</head>
<style>
body{
	margin: 0px;
}
* {
    box-sizing: border-box;
}
div{
	box-sizing: inherit;
}
[class*="col-"] {
    float: left;
}
table {
	padding: 0px;
}
tr>th{
	border: 1px solid #000;
	margin: 0px;
	color: #000;
	font-weight: bolder;
}
tr>td{
	border: 1px solid #000;
	margin: 0px;
	padding: 0px;
	font-size: 15px;
}
tr{
	border: 1px solid #000;
	margin-bottom: 0px;
}
.text-center{
	text-align: center;
}
.col-md-1 {width: 8.33%;}
.col-md-2 {width: 16.66%;}
.col-md-3 {width: 25%;}
.col-md-4 {width: 33.33%;}
.col-md-5 {width: 41.66%;}
.col-md-6 {width: 50%;}
.col-md-7 {width: 58.33%;}
.col-md-8 {width: 66.66%;}
.col-md-9 {width: 75%;}
.col-md-10 {width: 83.33%;}
.col-md-11 {width: 91.66%;}
.col-md-12 {width: 100%;}
.col-md-of-4{margin-left: 33.33%;}
.col-md-of-2{margin-left: 16.66%;}
@media (max-width: 500px) {
	[class*="col-"] {
    float: left;
    padding: 10px;
    width: 100% !important;
	}
	[class*="col-of"]{
	display: none;
	}
}
</style>
<body>
		<div class="col-md-12">
			<div class="form-panel" style="margin: 0px;">
				<h3 class="text-center">
						DAFTAR SISWA YANG {{$data['tittle']}} BIAYA PKL<br>
						TAHUN {{date('Y')}}
				</h3>
				<h5 style="margin-bottom: 0px;">
				</h5>
				<table style="width: 100%;">
					<thead>
						<tr>
							<td style="width: 75%;border-style: none;">
							@foreach($data['grades'] as $grade)
								KELAS : {{$grade->steps()->first()->step}} {{$grade->divisions()->first()->division_name}}<br>
							@endforeach
							</td>
							<td class="text-center" style="width: 25%;border-style: none;">TOTAL : {{$data['students']->count()}}</td>
						</tr>
					</thead>
				</table>
				<table class="col-md-12">
					<thead>
						<tr>
							<th class="text-center col-md-3" style="padding: 0px;">NIS</th>
							<th class="text-center col-md-6">NAME</th>
							<th class="text-center col-md-3" style="padding: 0px;">GENDER</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $data['students'] as $index => $student )
						<tr>
							<td class="text-center col-md-3" style="padding: 0px;">{{ $student->nis }}</td>
							<td class="text-center col-md-6">{{ $student->name }}</td>
							<td class="text-center col-md-3" style="padding: 0px;">{{ $student->gender }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					 
				</div>
			</div><!-- /content-panel -->
		</div><!-- /col-lg-12 -->
</body>
</html>