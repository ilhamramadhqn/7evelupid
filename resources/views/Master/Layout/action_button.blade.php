<?php
$segment=Request::segment(1);

?>

<div class="row">
	<div class="col-md-6">
		@can($segment.'.create')
		<a class="btn btn-primary" href="{{ route($segment.'.create') }}"> <i class="feather icon-plus"></i>&nbsp Tambah Data</a>
		&nbsp
		@endcan

		@can($segment.'.destroy')
		<button id="btn_delete" class="btn btn-danger delete_all" data-url="{{ url($segment.'DeleteAll') }}">
			<i class="feather icon-trash"></i>&nbsp Hapus Data Terpilih
		</button>
		@endcan
	</div>
	<div class="col-md-6" >
		<ul class="pagination justify-content-end">
			<a href="{{url($segment)}}" class="btn btn-warning  invisible" id="filter">
				<i class="feather icon-x"></i>&nbsp Hapus Filter
			</a>
			&nbsp
			@can($segment.'.export')
			<button class="btn  btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="feather icon-printer"></i> Cetak
			</button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="{{$segment}}.pdf">Pdf</a>
				<a class="dropdown-item" href="{{url($segment.'.excel')}}">Excel</a>
			</div>
			@endcan
		</ul>
	</div>
</div>
