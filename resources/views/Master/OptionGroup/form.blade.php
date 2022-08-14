@extends('Master.Layout.apps')
@section('content')
@component('Master/Layout/form_up')@endcomponent
@php 
$segment=Request::segment(1); 

if(Request::segment(2) == 'create' )
{
	$action=$segment.'.store';
	$method='POST';
}
else
{
	$action=$segment.'.update' ; 
	$method='PUT';
	$action = [$segment.'.update', $d->id]; 
}
$n=1;
@endphp

{{ Form::model($d, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Nama </label>
			{!! Form::text('name', null, array('placeholder' => 'Text','class' => 'form-control')) !!}
		</div>


	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label>Status</label>
			
			{!! Form::select('status', to_dropdown('Status'),[$d->status], array('class' => 'form-control')) !!}
<!-- 			<select class="form-control" name="status" >
				<option value="T" <?php if(old('status') == "T") echo "selected"; ?> >Aktif</option>
				<option value="F" <?php if(old('status') == "F") echo "selected"; ?> >Tidak Aktif</option>
			</select> -->
		</div>
	</div>
	<div class="col-md-6 " id="value-list">
		<div class="form-group">
			<label>Option Value </label>
			<div class="input-group mb-3">
				<div class="input-group-append">
					<button type="button" class="btn btn-success add-value" >
						<i class="feather icon-plus"></i>
					</button>
				</div>
			</div>

			@foreach($d->option_values as $v)
			<div class="input-group mb-3">
				<input type="text" name="value[{{$n}}}]" placeholder="Text" class="form-control" value="{{$v->value}}"/>
				<button type="button" class="btn btn-danger remove-value"><i class="feather icon-minus"></i></button>
			</div>
			@php $n++;@endphp
			@endforeach

		</div>
	</div>

</div>

@component('Master/Layout/form_btn')@endcomponent	

{!! Form::close() !!}
@component('Master/Layout/form_dw')@endcomponent	

@endsection
