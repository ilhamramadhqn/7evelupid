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
					<label class="text-white">Status</label>
					<select class="form-control" name="status">
						<option value="created" >Created</option>
						<option value="updated" >Updated</option>
						<option value="deleted" >Deleted</option>
					</select>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label class="text-white">Tanggal</label>
					{!! Form::text('tanggal', null, array('placeholder' => 'Text','class' => 'form-control datepicker-here','data-language'=>'en','data-date-format'=>'dd-M-yyyy')) !!}
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