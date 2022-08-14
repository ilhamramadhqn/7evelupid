<?php

namespace App\Http\Controllers\Master;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\MasterModel\MenuModel;
// use uxweb\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;
class MasterMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:MasterMenu.index', ['only' => ['index']]);
        $this->middleware('permission:MasterMenu.create', ['only' => ['create','store']]);
        $this->middleware('permission:MasterMenu.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:MasterMenu.destroy', ['only' => ['destroy','deleteAll']]);
        $this->middleware('permission:MasterMenu.print', ['only' => ['export']]);
                // $this->middleware('role:SUPER ADMIN');
    }

    public function index(Request $request)
    {
        $data = MenuModel::fetch($request);
        
        return view('Master.MasterMenu.default',compact('data',$data));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drop_menu = MenuModel::where('uri','#!')->get();
        $d = new  MenuModel;
        $icon=DB::table('mst_icon')->get();

        \Assets::add('MasterMenu.js');
        return view('Master.MasterMenu.form',compact('drop_menu','d','icon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'nama_menu' => 'required',
          'sequence' => 'required',
          'uri' => 'required',
      ]);
        $add =new MenuModel();

        $add->nama_menu=$request['nama_menu'];
        $add->menu_parent=$request['menu_parent'];
        $add->sequence=$request['sequence'];
        $add->uri=$request['uri'];
        $add->icon=$request['icon'];
        $add->status=$request['status'];
        $add->save();
        Alert::success('Berhasil','Data '.$add->nama_menu.' tersimpan');
        return redirect('MasterMenu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d = MenuModel::find($id);
        $drop_menu = MenuModel::where('uri','#!')->get();
        $icon=DB::table('mst_icon')->get();
        \Assets::add('MasterMenu.js');

        return view('Master.MasterMenu.form',compact('d','drop_menu','icon'));
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
        $this->validate($request,[
            'nama_menu' => 'required',
            'sequence' => 'required',
            'uri' => 'required',
        ]);
        $update =MenuModel::where('id',$id)->first();

        $update->nama_menu=$request['nama_menu'];
        $update->menu_parent=$request['menu_parent'];
        $update->sequence=$request['sequence'];
        $update->uri=$request['uri'];
        $update->icon=$request['icon'];
        $update->status=$request['status'];
        $update->update();
        Alert::success('Berhasil','Data telah diubah');
        return redirect('MasterMenu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =MenuModel::find($id);
        $delete->delete();
        Alert::success('Berhasil','Data telah dihapus');
        return redirect('MasterMenu');
    }
    public function print($id)
    {
        $delete =MenuModel::find($id);
        $delete->delete();

        Alert::success('Data telah dihapus', 'Berhasil');
        return redirect('MasterMenu');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("mst_menu")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }

}
