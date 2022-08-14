<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Models\KategoriModel;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;
use Ramsey\Uuid\Uuid;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:Kategori.index', ['only' => ['index']]);
        $this->middleware('permission:Kategori.create', ['only' => ['create','store']]);
        $this->middleware('permission:Kategori.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Kategori.destroy', ['only' => ['destroy','deleteAll']]);
        $this->middleware('permission:Kategori.print', ['only' => ['export']]);
                // $this->middleware('role:SUPER ADMIN');
    }

    public function index(Request $request)
    {
        $data = KategoriModel::fetch($request);
        
        return view('Kategori.default',compact('data',$data));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d = new Kategorimodel;
        
        return view('Kategori.form',compact('d'));
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
          'nama_kategori' => 'required'
      ]);
        $add =new KategoriModel();
        
        $add->id=Uuid::uuid4();
        $add->key=$add->id;
        $add->value=$request['nama_kategori'];
        $add->sequence=0;
        $add->status=$request['status'];
        $add->option_group_id='d520d705-a5bc-4915-813d-56ea13b8d0e2';
        $add->save();
        Alert::success('Berhasil','Data '.$add->value.' tersimpan');
        return redirect('Kategori');
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
        $d = KategoriModel::find($id);
        
        return view('Kategori.form',compact('d'));
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
            'nama_kategori' => 'required',
            
        ]);
        $add =KategoriModel::where('id',$id)->first();

        $add->value=$request['nama_kategori'];
        $add->status=$request['status'];
        $add->update();
        Alert::success('Berhasil','Data telah diubah');
        return redirect('Kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =KategoriModel::find($id);
        $delete->delete();
        Alert::success('Berhasil','Data telah dihapus');
        return redirect('Kategori');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("mst_option_values")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }

}
