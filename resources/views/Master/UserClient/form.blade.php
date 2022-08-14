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


$length=strlen(substr($d->pendidikan,0,strpos($d->pendidikan,',')+2));
@endphp

{{ Form::model($d, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
	@csrf
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>KTP</label>
				{!! Form::number('ktp', null, array('placeholder' => 'Nomor','class' => 'form-control','onkeypress'=>'return angka(event, false)')) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Nama</label>
				{!! Form::text('nama', null, array('placeholder' => 'Text','class' => 'form-control','onkeyup'=>'this.value = this.value.toUpperCase()')) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Email</label>
				{!! Form::text('email', null, array('placeholder' => 'Text','class' => 'form-control','id'=>'email')) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Tgl Lahir</label>
				{!! Form::text('tgl_lahir', null, array('placeholder' => 'Text','class' => 'form-control datepicker-here','data-language'=>'en','data-date-format'=>'dd-M-yyyy')) !!}

			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Jenis Kelamin</label>
				 {!! Form::select('jenis_kelamin', to_dropdown('JenisKelamin'),[$d->jenis_kelamin], array('class' => 'form-control')) !!}

			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Agama</label>
				 {!! Form::select('agama', to_dropdown('Agama'),[$d->agama], array('class' => 'form-control')) !!}
				 	
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<label>Alamat</label>
				{!! Form::text('alamat', null, array('placeholder' => 'Text','class' => 'form-control','onkeyup'=>'this.value = this.value.toUpperCase()')) !!}	
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>No Telp</label>
				{!! Form::text('no_telp', null, array('placeholder' => 'Nomor','class' => 'form-control','onkeypress'=>'return angka(event, false)')) !!}
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
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Jenjang</label>
						{!! Form::select('jenjang', to_dropdown('Jenjang'),[$d->jenjang], array('class' => 'form-control')) !!}		
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Jurusan</label>
						{!! Form::text('jurusan', substr($d->pendidikan,$length,strpos($d->pendidikan,'(')-$length), array('placeholder' => 'Text','class' => 'form-control','onkeyup'=>'this.value = this.value.toUpperCase()')) !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Sekolah/Univ</label>
						{!! Form::text('sekolah', substr($d->pendidikan,strpos($d->pendidikan,'(')+1,-6), array('placeholder' => 'Text','class' => 'form-control','onkeyup'=>'this.value = this.value.toUpperCase()')) !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Th Lulus</label>
						
				        {!! Form::text('th_lulus', substr($d->pendidikan,-4), array('class' => 'form-control datepicker-here','data-language'=>'en','data-date-format'=>'yyyy','data-view'=>'years','data-min-view'=>'years')) !!}

					</div>
				</div>

			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Gelar</label>
				{!! Form::text('gelar', null, array('placeholder' => 'Text','class' => 'form-control','onkeyup'=>'this.value = this.value.toUpperCase()')) !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Jabatan</label>
				 {!! Form::select('jabatan', to_dropdown('Jabatan'),[$d->jabatan], array('class' => 'form-control')) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Bagian</label>
				
				 {!! Form::select('bagian', to_dropdown('Bagian'),[$d->bagian], array('class' => 'form-control')) !!}
			</div>
		</div>
		
	</div>
	@component('Master/Layout/form_btn')@endcomponent	
</form>
     

@component('Master/Layout/form_dw')@endcomponent			
@endsection
