@component('Master.Layout.filter_up')@endcomponent
<?php
$segment=Request::segment(1);
?>
<div class="collapse " id="collapse">
	<form method="post" action="{{url($segment.'/filter')}}">
		@csrf
		<div class="row filter">
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-white">Nama menu</label>
					<input type="text" class="form-control" placeholder="Text" name="nama_menu" onkeyup="this.value = this.value.toUpperCase();">
				</div>			
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-white">Status</label>
					<select class="form-control" name="status">
						<option value="T" >Aktif</option>
						<option value="F" >Tidak Aktif</option>
					</select>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12" align="right">
				<button type="submit" class="btn  btn-warning"><i class="feather icon-search"></i>&nbsp Cari</button>
			</div>

		</div>

	</form>
</div>
@component('Master.Layout.filter_dw')@endcomponent