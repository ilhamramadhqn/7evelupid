@extends('Master.Layout.apps')
@section('content')
<?php
$segment=Request::segment(1);
?>
@include($segment.'.filter')
<div class="page-header" >
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
									</th>
									<th>foto</th>
									<th>Nama produk</th>
									<th>satuan</th>
									<th>varian</th>
									<th>kategori</th>
									<th>keterangan</th>
									<th>Status</th>

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
								<td>{{$d->foto}}</td>
								<td>{{$d->nama}}</td>
								<td>{{opval('satuan',$d->satuan)}}</td>
								<td>
								<a href="{{url($segment.'/'.$d->id.'/varian')}}"class="btn btn-success"> 
								Tambah Varian
								</a>
								</td>
								<td>{{opval('kategori',$d->kategori)}}</td>
								<td>{{$d->keterangan}}</td>
								<td>{!!opval('Status',$d->status)!!}</span></td>
								@component('Master.Layout.edit_delete_button')
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



@endsection
