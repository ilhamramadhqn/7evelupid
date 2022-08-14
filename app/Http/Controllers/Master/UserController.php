<?php


namespace App\Http\Controllers\Master;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

use App\MasterModel\MasterUserModel;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
     $this->middleware('permission:MasterUserLogin.index', ['only' => ['index']]);
     $this->middleware('permission:MasterUserLogin.create', ['only' => ['create','store']]);
     $this->middleware('permission:MasterUserLogin.edit', ['only' => ['edit','update']]);
     $this->middleware('permission:MasterUserLogin.destroy', ['only' => ['destroy','deleteAll']]);
     $this->middleware('permission:MasterUserLogin.print', ['only' => ['export']]);
     $this->middleware('permission:MasterUserLogin.resetPassword', ['only' => ['resetPassword']]);
 }

 public function index(Request $request)
 {
    $data = User::fetch($request);
    \Assets::add('MasterUserLogin.js');
    return view('Master.MasterUserLogin.default',compact('data'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name','!=','SUPER ADMIN')->pluck('name','name')->all();

        $cek = User::all();
        \Assets::add('MasterUserLogin.js');
        $avaible=array();
        foreach ($cek as $c) {
            array_push($avaible,$c->username);
        }

        $data = MasterUserModel::wherenotin('nip',$avaible)->where('status','T')->paginate(10);
        
        return view('Master.MasterUserLogin.form',compact('roles','data'));
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
            // 'username' => 'required|unique:users,username',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make('12345678');


        $user = User::create($input);
        $user->assignRole($request->input('role'));


        Alert::success('Berhasil','Data '.$request->name.' tersimpan');
        return redirect('MasterUserLogin');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('Master.MasterUserLogin.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::where('name','!=','SUPER ADMIN')->pluck('name','name')->all();

        $userRole = $user->roles->pluck('name','name')->all();

        return view('Master.MasterUserLogin.edit',compact('user','roles','userRole'));
    }

    public function resetPassword(Request $request)
    {   

        $user = User::find($request->id);


        $user->password = Hash::make('12345678');
        $user->update();

        Alert::success('Berhasil','Pasword telah direset');
        return redirect('MasterUserLogin');
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required'
        ]);
        $input = $request->all();

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->input('roles'));

        Alert::success('Berhasil','Data telah diubah');
        return redirect('MasterUserLogin');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        
        Alert::success('Berhasil','Data telah dihapus');
        return redirect('MasterUserLogin');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("users")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }


    public function print($id)
    {
        return redirect('MasterRole');
    }
}