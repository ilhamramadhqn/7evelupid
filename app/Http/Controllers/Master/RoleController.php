<?php


namespace App\Http\Controllers\Master;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\MasterModel\MenuModel;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Route;
use Carbon\Carbon;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

     $this->middleware('permission:MasterRole.index', ['only' => ['index']]);
     $this->middleware('permission:MasterRole.create', ['only' => ['create','store']]);
     $this->middleware('permission:MasterRole.edit', ['only' => ['edit','update']]);
     $this->middleware('permission:MasterRole.destroy', ['only' => ['destroy','deleteAll']]);
     $this->middleware('permission:MasterRole.print', ['only' => ['export']]);
 }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','ASC')->paginate(10);
        return view('Master.MasterRole.default',compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permission=collect(Route::getRoutes());
        $role = new role;
        $menu = MenuModel::where('status','T')->where('uri','!=','#!')->get();
        $role_permission=array(''=>'');

        return view('Master.MasterRole.form',compact('permission','role','menu','role_permission'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('nama')]);
        foreach($request->input('permission') as $p )
        {
            $permission=Permission::updateorcreate(['name' =>  $p]);
        }

        $role->syncPermissions($request->input('permission'));

        Alert::success('Berhasil','Data '.$request->nama.' tersimpan');
        return redirect('MasterRole');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        $permission=collect(Route::getRoutes());
        $role_permission=Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        ->where("role_has_permissions.role_id",$role->id)->pluck('permissions.name','permissions.name')
        ->all();
        $menu = MenuModel::where('status','T')->where('uri','!=','#!')->get();

        return view('Master.MasterRole.form',compact('permission','role','menu','role_permission'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('nama');
        $role->save();
        foreach($request->input('permission') as $p )
        {
            $permission=Permission::updateorcreate(['name' =>  $p]);
        }

        $role->syncPermissions($request->input('permission'));

        Alert::success('Berhasil','Data telah diubah');
        return redirect('MasterRole');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();

       Alert::success('Berhasil','Data telah dihapus');
        return redirect('MasterRole');
    }
    
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("roles")->whereIn('id',explode(",",$ids))->delete();
// return redirect('MasterRole');
        return response()->json(['success'=>"Products Deleted successfully."]);
    }


    public function print($id)
    {
        return redirect('MasterRole');
    }
}