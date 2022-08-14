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
			<label>Nama Menu</label>
			{!! Form::text('nama_menu', null, array('placeholder' => 'Text','class' => 'form-control')) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Parent Menu</label>
			<select class="form-control" name="menu_parent" >
				<option value="0"?>Tidak ada</option>
				@foreach($drop_menu as $dm)
				<option value="{{$dm->id}}"?>{{$dm->nama_menu}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Urutan</label>
			{!! Form::number('sequence', null, array('placeholder' => 'Text','class' => 'form-control')) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>URI</label>
			{!! Form::text('uri', null, array('placeholder' => 'Text','class' => 'form-control')) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Icon</label>

			<div class="input-group mb-3">
				{!! Form::text('icon', null, array('placeholder' => 'Text','class' => 'form-control','id'=>'icon')) !!}
				<div class="input-group-append">
					<button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter">
						<i class="feather icon-plus"></i>
					</button>
				</div>
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


<div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">List Icon</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body text-center">
				@foreach($icon as $i)
				<button type="button" class="add-icon" data-icons="{{$i->icon}}"  data-dismiss="modal">{!!$i->icon!!}</button>&nbsp
				@if($n==($n % 20 ==0 ))<br>@endif
				@php $n++; @endphp
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
