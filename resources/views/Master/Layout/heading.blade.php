<?php

$uri =$_SERVER['REQUEST_URI'];
use App\MasterModel\MenuModel;
$heading=MenuModel::all();
?>

@foreach($heading as $data)

<?php
$avaible=strpos($uri,$data->uri);
if($avaible==1)
{
	?>
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-12">
					<div class="page-header-title">
						<h5 class="m-b-10" id="heading" >{{ $data->nama_menu }}</h5>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="Dashboard"><i class="feather icon-home"></i></a></li>
						@if($data->menu_parent == 'F')
						
						<li class="breadcrumb-item"><a href="#!">{{$data->nama_menu}}</a></li>
						
						@else
						@foreach($heading as $menu)	
						@if($menu->id == $data->menu_parent)
						
						<li class="breadcrumb-item"><a href="#!">{{$menu->nama_menu}} </a></li>
						@endif
						@endforeach
						<li class="breadcrumb-item"><a href="#!">{{$data->nama_menu}}</a></li>
						
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>

	<?php 
}
else {

}
?>
@endforeach	

@if (count($errors) > 0)
<div class="alert alert-danger  alert-dismissible fade show" role="alert">
	<strong>Terjadi Kesalahan</strong>
	<br>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif