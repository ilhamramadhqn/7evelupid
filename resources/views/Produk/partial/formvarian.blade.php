@extends('Master.Layout.apps')
@section('content')
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <h5>Tambah Varian</h5>

@php 
$segment=Request::segment(1); 
if(Request::segment(3) == 'varian' )
{
	$action=$segment.'.varianstore';
	$method='POST';
}
else
{
}

@endphp

{{ Form::model($d, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
<div class="row">
<div class="col-md-6 " id="value-list">
		<div class="form-group">
			<label>Varian </label>
			<div class="input-group mb-3">
				<div class="input-group-append">
					<button type="button" class="btn btn-success add-value" >
						<i class="feather icon-plus"></i>
					</button>
				</div>
			</div>

		</div>
	</div>
	{!! Form::hidden('varian',$id, array('placeholder' => 'Text','class' => 'form-control')) !!}
	

</div>
@component('Master.Layout/form_btn')@endcomponent	

{{ Form::close() }}
@component('Master.Layout/form_dw')@endcomponent	
@endsection
