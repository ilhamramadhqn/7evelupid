@extends('Master.Layout.apps')
@section('content')
<?php
$segment=Request::segment(1);
?>
@include('Master.'.$segment.'.filter')
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<h5>Data</h5>
				@component('Master.Layout.action_button')
				@endcomponent
				<div class="row">
					<div class="col-md-12 table-responsive">	
						<table class="table table-bordered table-striped" id="tab">
							<thead >
								<tr id="kolom">
									<th class="btn_delete">
										<label class="container">
											<input type="checkbox" class="sub_chk" id="check_all">
											<span class="checkmark"></span>
										</label>
										<br>
										<th>nip</th>
										<th>ktp</th>
										<th>nama</th>
										<th>email</th>
										<th>tgl lahir</th>
										<th>gender</th>
										<th>agama</th>
										<th>alamat</th>
										<th>no telp</th>
										<th>pendidikan</th>
										<th>gelar</th>
										<th>jabatan</th>
										<th>bagian</th>
										<th>status</th>
									</tr>
								</thead>
								@foreach($data as $d)
								<tr id="tr_{{$d->id}}">
									<td class="btn_delete">
										<label class="container">
											<input type="checkbox" class="sub_chk" data-id="{{$d->id}}">
											<span class="checkmark"></span>
										</label>
									</td>
									<td>{{$d->nip}}</td>
									<td>{{$d->ktp}}</td>
									<td>{{$d->nama}}</td>
									<td>{{$d->email}}</td>
									<td>{{ date_formatted($d->tgl_lahir,'%e %B %Y')}}</td>
									<td>{{opval('JenisKelamin',$d->jenis_kelamin)}}</td>
									<td>{{opval('Agama',$d->agama)}}</td>
									<td>{{$d->alamat}}</td>
									<td>{{$d->no_telp}}</td>
									<td>{{opval('Jenjang',$d->jenjang)}}, {{$d->pendidikan}}</td>
									<td>{{$d->gelar}}</td>
									<td>{{opval('Jabatan',$d->jabatan)}}</td>
									<td>{{opval('Bagian',$d->bagian)}}</td>
									<td>{!!opval('Status',$d->status)!!}</td>
									@component('Master/Layout/edit_delete_button')
									@slot('id') {{$d->id}} @endslot
									@slot('tooltip') {{$d->nama}} @endslot
									@endcomponent

								</tr>
								@endforeach
							</table>
							<div class="row">
								<div class="col-md-6">
									<ul class="pagination justify-content-left">Jumlah Data : {{$data->total()}}</ul>
								</div>
								<div class="col-md-6">
									<ul class="pagination justify-content-end">{{ $data->appends(\Illuminate\Support\Arr::except(request()->input(), '_token'))->setPath(url($segment))->links() }}</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection
