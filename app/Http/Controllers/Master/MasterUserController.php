<?php

namespace App\Http\Controllers\Master;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\MasterModel\MasterUserModel;
use RealRashid\SweetAlert\Facades\Alert;
use Ramsey\Uuid\Uuid;

class MasterUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
     $this->middleware('permission:MasterUsers.index', ['only' => ['index']]);
     $this->middleware('permission:MasterUsers.create', ['only' => ['create','store']]);
     $this->middleware('permission:MasterUsers.edit', ['only' => ['edit','update']]);
     $this->middleware('permission:MasterUsers.destroy', ['only' => ['destroy','deleteAll']]);
     $this->middleware('permission:MasterUsers.print', ['only' => ['export']]);
   }
   public function index(Request $request)
   {
     $data = MasterUserModel::Fetch($request);
     return view('Master.MasterUsers.default',compact('data'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
      $d=new MasterUserModel;
      return view('Master.MasterUsers.form',compact('d'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $add =new MasterUserModel();
     $this->validate($request,[
      'ktp' => 'required',
      'nama' => 'required',
      'email' => 'required|email|unique:users,email',
      'tgl_lahir' => 'required',
      'alamat' => 'required',
      'no_telp' => 'required',
      'sekolah' => 'required',
      'th_lulus' => 'required',

    ]);
     if(!$request->file('foto'))
     { 
      $foto_NewName="";
    }
    else
    {
      $fotoName   = $request->file('foto')->getClientOriginalName();
      $fotoExt   = $request->file('foto')->getClientOriginalExtension();
      $foto_NewName = $request['nip']."." .$fotoExt;

      if (is_dir('users_doc/' . $request['nip'])) { } else {
        mkdir('users_doc/' . $request['nip']);
      }
      $request->file('foto')->move("users_doc/" . $request['nip'], $foto_NewName);
    }

    $add->id=Uuid::uuid4();
    $add->nip=nip($request['tgl_lahir']);
    $add->ktp=$request['ktp'];
    $add->nama=$request['nama'];
    $add->email=$request['email'];
    $add->tgl_lahir=date('Y-m-d',strtotime($request['tgl_lahir']));
    $add->jenis_kelamin=$request['jenis_kelamin'];
    $add->alamat=$request['alamat'];
    $add->no_telp=$request['no_telp'];
    $add->jenjang=$request['jenjang'];
    $add->pendidikan=$request['jurusan']." (".$request['sekolah'].") ".$request['th_lulus'];
    $add->gelar=$request['gelar'];
    $add->foto=$foto_NewName;
    $add->agama=$request['agama'];
    $add->jabatan=$request['jabatan'];
    $add->bagian=$request['bagian'];
    $add->status='T';
    $add->save();
    Alert::success('Berhasil','Data '.$add->nama.' tersimpan');
    return redirect('MasterUsers');
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
      $d = MasterUserModel::find($id);
      return view('Master.MasterUsers.form',compact('d'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {$this->validate($request,[
      'ktp' => 'required',
      'nama' => 'required',
      'email' => 'required|email',
      'tgl_lahir' => 'required',
      'alamat' => 'required',
      'no_telp' => 'required',
      'sekolah' => 'required',
      'th_lulus' => 'required',
    ]);
    $update =MasterUserModel::where('id',$id)->first();
    if(!$request->file('foto'))
    {
      $foto_NewName=$update->foto;
    }
    else
    {
      $fotoName   = $request->file('foto')->getClientOriginalName();
      $fotoExt   = $request->file('foto')->getClientOriginalExtension();
      $foto_NewName = $request['nip']."." .$fotoExt;

      if (is_dir('users_doc/' . $request['nip'])) { } else {
        mkdir('users_doc/' . $request['nip']);
      }
      $request->file('foto')->move("users_doc/" . $request['nip'], $foto_NewName);
    }

    $update =MasterUserModel::where('id',$id)->first();
    $update->ktp=$request['ktp'];
    $update->nama=$request['nama'];
    $update->email=$request['email'];
    $update->tgl_lahir=date('Y-m-d',strtotime($request['tgl_lahir']));
    $update->jenis_kelamin=$request['jenis_kelamin'];
    $update->alamat=$request['alamat'];
    $update->no_telp=$request['no_telp'];
    $update->jenjang=$request['jenjang'];
    $update->pendidikan=$request['jurusan']." (".$request['sekolah'].") ".$request['th_lulus'];
    $update->gelar=$request['gelar'];
    $update->foto=$foto_NewName;
    $update->agama=$request['agama'];
    $update->jabatan=$request['jabatan'];
    $update->bagian=$request['bagian'];
    $update->update();
    Alert::success('Berhasil','Data telah diubah');
    return redirect('MasterUsers');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $delete =MasterUserModel::where('id',$id)->first();
     $delete->status='F';
     $delete->update();


     Alert::success('Berhasil','Data telah dihapus' );
     return redirect('MasterUsers');
   }


   public function deleteAll(Request $request)
   {
    $ids = $request->ids;
    // DB::table("mst_user")->whereIn('id',explode(",",$ids))->delete();
    $deleteAll=DB::table("mst_user")->whereIn('id',explode(",",$ids))->update(array('status' => 'F'));


    return response()->json(['success'=>"Products Deleted successfully."]);
  }



}
