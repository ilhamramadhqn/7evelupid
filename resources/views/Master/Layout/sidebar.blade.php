
<nav class="pcoded-navbar menupos-fixed menu-light ">
	<div class="navbar-wrapper  ">
		<div class="navbar-content scroll-div " >
			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption">
					<label>List Menu</label>
				</li>

				<?php
				$segment=Request::segment(1);
				// use Illuminate\Support\Facades\DB;
				use App\MasterModel\MenuModel;
				use App\MasterModel\Relasi\VwMenuModel;

				$rd=Auth::user()->getRoleId();	
				
				$menu=MenuModel::where('status','=','T')->orderby('sequence','asc') ->get();
				$permission_p=VwMenuModel::where('role_id',$rd)->pluck('menu_parent')->all();
				$permission_ph=VwMenuModel::where('role_id',$rd)->pluck('id')->all();
				$permission_c=VwMenuModel::where('role_id',$rd)->pluck('uri')->all();
				array_push($permission_ph,1);
				

				$head_active=MenuModel::where('status','=','T')->where('uri','=',$segment)->first();
				$h_a=!$head_active ? "0" : $head_active->menu_parent;
				// $menu=DB::table('mst_menu')
				// ->join('roles_has_menu','roles_has_menu.id_menu','=','mst_menu.id')
				// ->where('id_role',$rd)
				// ->get();
				// dd($menu);

				?>

				@foreach($menu as $m)

				@if($m->menu_parent==0)
				@if($m->uri != "#!")

				@php $pp=in_array($m->id,$permission_ph) ? true : false;@endphp
				@if($pp==1)
				<li class="nav-item">
					<a href="{{url($m->uri)}}" class="nav-link">
						<span class="pcoded-micon">{!! $m->icon !!}</span>
						<span class="pcoded-mtext">{{ $m->nama_menu }} </span>
					</a>
				</li>
				@endif


				@else
				@php $pp=in_array($m->id,$permission_p) ? true : false;@endphp
				@if($pp==1)
				<li class="nav-item pcoded-hasmenu @if($h_a == $m->id) active pcoded-trigger @endif">
					<a href="{{url($m->uri)}}" class="nav-link">
						<span class="pcoded-micon">{!! $m->icon !!}</span>
						<span class="pcoded-mtext">{{ $m->nama_menu }} </span>
					</a>
					<ul class="pcoded-submenu" >

						@foreach($m->child as $c)
						@php $pc=in_array($c->uri,$permission_c) ? true : false;@endphp
						@if($pc==1)			
						<li class="@if($segment==$c->uri) active @endif">
							<a href="{{url($c->uri)}}" class='sidebarToggle' >
								{{$c->nama_menu}}  

							</a>
						</li>
						@endif
						@endforeach
					</ul>
				</li>
				@endif

				@endif
				
				@endif
				
				@endforeach
			</ul>
		</div>
	</div>
</nav>
