
@php

use Illuminate\Support\Facades\DB;
$name=DB::table('mst_configurations')->where('key','name')->first();

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ $name->value }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Codedthemes" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}">	
	<link type="text/css" rel="stylesheet" href="{{asset('assets/css/checkbox.css')}}">

	<link type="text/css" rel="stylesheet" href="{{asset('assets/plugin/datepicker/css/datepicker.min.css')}}">

</head>
<style>
.foto{
	height: 350px;
	width: 300px;
}
.foto_kecil{
	height: 40px;
	width: 40px;
}
</style>
@guest
@yield('logincontent') 
@else

<body class="">
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	@include('Master.Layout.topbar')

	@include('Master.Layout.sidebar')


	<section class="pcoded-main-container ">
		<div class="pcoded-content ">
			@include('Master.Layout.heading')
			
			@yield('content')
		</div>
	</section>	
</body> 

@endguest
<script  type="text/javascript"  src="{{asset('assets/js/vendor-all.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('assets/js/pcoded.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('assets/js/master/master.js')}}"></script>
<script  type="text/javascript" src="{{asset('assets/plugin/datepicker/js/datepicker.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('assets/plugin/datepicker/js/i18n/datepicker.en.js')}}"></script>


<!-- <script  type="text/javascript" src="{{asset('assets/plugin/sweetalert/sweetalert.min.js')}}"></script> -->
<script  type="text/javascript" src="{{asset('assets/plugin/sweetalert/sweetalert.all.js')}}"></script>


{!! Assets::js() !!}
@include('sweetalert::alert')
</html>