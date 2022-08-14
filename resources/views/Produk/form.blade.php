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
			<label>Nama Produk</label>
			{!! Form::text('nama_produk',$d->nama, array('placeholder' => 'Text','class' => 'form-control')) !!}
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label>Satuan</label>
			{!! Form::select('satuan', to_dropdown('satuan'),[$d->satuan], array('class' => 'form-control')) !!}
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label>Keterangan</label>
			{!! Form::text('keterangan',$d->keterangan, array('placeholder' => 'Text','class' => 'form-control')) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Kategori</label>
			{!! Form::select('kategori', to_dropdown('kategori'),[$d->kategori], array('class' => 'form-control')) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Foto</label>
			<div class="custom-file">
				<img src="{{asset('assets/images/user-default.jpg')}}" class="img-radius wid-40" alt="User-Profile-Image">
				&nbsp
				<input name="foto" type="file"  id="foto">
			</div>
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
