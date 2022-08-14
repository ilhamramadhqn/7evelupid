@extends('Master.Layout.apps')
@section('content')
@component('Master.Layout/form_up')@endcomponent
@php 
$segment=Request::segment(1); 
if(Request::segment(2) == 'create' )
{
	$action=$segment.'.store';
	$method='POST';
}
else
{
	$method='PUT';
	$action = [$segment.'.update', $d->id]; 
}
@endphp

{{ Form::model($d, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Nama Kategori</label>
			{!! Form::text('nama_kategori', $d->value, array('placeholder' => 'Text','class' => 'form-control')) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Status</label>
			{!! Form::select('status', to_dropdown('Status'),[$d->status], array('class' => 'form-control')) !!}

		</div>
	</div>

</div>
@component('Master.Layout/form_btn')@endcomponent	

{!! Form::close() !!}

@component('Master.Layout/form_dw')@endcomponent	
@endsection
