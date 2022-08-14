<?php 
use App\MasterModel\MasterUserModel;
use App\MasterModel\MasterPosisiModel;
use App\MasterModel\MasterDivisiModel;

use App\MasterModel\UsersModel;
use Illuminate\Support\Facades\DB;

$masteruser=MasterUserModel::where('nip',Auth::user()->username)->first();


$name=DB::table('mst_configurations')->where('key','name')->first();

?>

<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">
	<div class="m-header">
		<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
		<a href="#!" class="b-brand">{{ $name->value }}</a>
		<a href="#!" class="mob-toggler">
			<i class="feather icon-more-vertical"></i>
		</a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav ml-auto">
			
			<li>
				<div class="dropdown drp-user">
					<a href="#!" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
						<?php
						if($masteruser->foto == '')
						{
							?>
							<img src="{{asset('assets/images/user-default.jpg')}}" class="img-radius wid-40" alt="User-Profile-Image">
							<?php
						}
						else
						{
							$file_pointer = 'users_doc/'.$masteruser->nip.'/'.$masteruser->foto; 
							?>
							<img src="{{asset($file_pointer)}}"class="img-radius foto_kecil" alt="User-Profile-Image">	
							<?php
						} 
						?>
						
						&nbsp {{Auth::user()->username}},&nbsp {{Auth::user()->name}}	
					</a>
					<div class="dropdown-menu dropdown-menu-right profile-notification ">
						<div class="pro-head">							
							Sebagai, {{ Auth::user()->getRoleNames()[0] }}
						</div>
						<ul class="pro-body">
							<li><a href="{{url('Pengaturan')}}" class="dropdown-item"><i class="feather icon-settings"></i> Kelola Akun</a></li>
							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="feather icon-log-out"></i> Log Out
								</a>
							</li>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</ul>
					</div>
				</div>

			</li>
		</ul>
	</div>
</header>

