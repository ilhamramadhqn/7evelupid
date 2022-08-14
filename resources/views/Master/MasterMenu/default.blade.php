@extends('Master.Layout.apps')
@section('content')
<?php
$segment=Request::segment(1);
?>
@include('Master.'.$segment.'.filter')
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
									<th>No</th>
									<th>Icon</th>
									<th>Nama Menu</th>
									<th>Uri</th>
									<th>Child Menu</th>
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
								<td>{{$d->sequence}}</td>
								<td>{!!$d->icon!!}</td>
								<td>{{$d->nama_menu}}</td>
								<td>{{$d->uri}}</td>
								<td>
									@if(count($d->child)>0)
									<div class="row">
										<div class="col-md-1"><b><i><u>No</u></i></b></div>
										<div class="col-md-4"><b><i><u>Nama Menu</u></i></b></div>
										<div class="col-md-4"><b><i><u>Uri</u></i></b></div>
										<div class="col-md-3"><b><i><u>Action</u></i></b></div>
									</div>
									@endif
									@foreach($d->child as $c)
									<div class="row">
										<div class="col-md-1">{{$c->sequence}}.</div>
										<div class="col-md-4">{{$c->nama_menu}}</div>
										<div class="col-md-4">{{$c->uri}}</div>
										<div class="col-md-3">
											@component('Master.Layout.edit_delete_button_c')
											@slot('id') {{$c->id}} @endslot
											@slot('tooltip') {{$c->nama_menu}} @endslot
											@endcomponent
										</div>
									</div>
									@endforeach
								</td>
								<td>{!!opval('Status',$d->status)!!}</span></td>
								@component('Master.Layout.edit_delete_button')
								@slot('id') {{$d->id}} @endslot
								@slot('tooltip') {{$d->nama_menu}} @endslot
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
