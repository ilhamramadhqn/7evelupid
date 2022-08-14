@extends('Master.Layout.apps')
@section('content')
<div class="row">
	<!-- order-card start -->
	<div class="col-md-3">
		<div class="card" align="center">
			<div class="card-body">
				<?php
				if($d->foto == '')
				{
					?>
					<img src="{{asset('assets/images/user-default.jpg')}}" class="img-thumbnail foto" >
					<?php
				}
				else
				{
					$file_pointer = 'users_doc/'.$d->nip.'/'.$d->foto; 
					?>
					<img src="{{asset($file_pointer)}}" class="img-thumbnail foto" >	
					<?php
				} 
				?>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="card ">

			<div class="card-body">
				<h5 class="m-b-10" id="heading">Kelola Akun</h5>
				<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Ubah Password</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<div class="row ">
							<div class="col-md-6">	
								<table class="table table-striped" id="tab">
									<tr>
										<th>Username</th>
										<td>{{$d->nip}}</td>
									</tr>
									<tr>
										<th>KTP</th>
										<td>{{$d->ktp}}</td>
									</tr>
									<tr>
										<th>Nama</th>
										<td>{{$d->nama}}</td>
									</tr>
									<tr>
										<th>Email</th>
										<td>{{$d->email}}</td>
									</tr>
									<tr>
										<th>Tanggal lahir</th>
										<td>{{date_formatted($d->tgl_lahir,'%e %B %Y')}}</td>
									</tr>
									<tr>
										<th>Jenis Kelamin</th>
										<td>{{opval('JenisKelamin',$d->jenis_kelamin)}}</td>
									</tr>
		
									<tr>
										<th>Alamat</th>
										<td>{{$d->alamat}}</td>
									</tr>

								</table>
							</div>
							<div class="col-md-6">	
								<table class="table table-striped" id="tab">
									<tr>
										<th>No Telp</th>
										<td>{{$d->no_telp}}</td>
									</tr>
									<tr>
										<th>Pendidikan <br>Terakhir</th>
										<td>{{opval('Jenjang',$d->jenjang)}}, {{$d->pendidikan}}</td>
									</tr>

								</table>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						<form action="{{route('Pengaturan.update',$d->nip)}}" method="POST"  >
							@method('PATCH')
							@csrf
							<div class="row">
								<div class="col-md-12" >
									<table class="table">
										<tr>
											<td>
												Password Lama
											</td>
											<td>
												<input name="password_lama" type='password' class='form-control'>
											</td>
										</tr>
										<tr>
											<td>
												Password Baru
											</td>
											<td>
												<input name="password_baru" type='password' class='form-control'>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12" align="right">
									<button type="submit" class="btn btn-primary"><i class="feather icon-save"></i>&nbsp Ubah</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				
			</div>

		</div>
	</div>
</div>



@endsection
