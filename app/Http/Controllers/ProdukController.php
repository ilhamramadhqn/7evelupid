<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Models\ProdukModel;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;

use Ramsey\Uuid\Uuid;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:Produk.index', ['only' => ['index']]);
        $this->middleware('permission:Produk.create', ['only' => ['create','store']]);
        $this->middleware('permission:Produk.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Produk.destroy', ['only' => ['destroy','deleteAll']]);
        $this->middleware('permission:Produk.show', ['only' => ['show']]);
                // $this->middleware('role:SUPER ADMIN');
    }

    public function index(Request $request)
    {
        $data = ProdukModel::fetch($request);
        
        return view('Produk.default',compact('data',$data));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d = new  ProdukModel;
        return view('Produk.form',compact('d'));
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
          'nama_produk' => 'required',
      ]);
        $add =new ProdukModel();

        $add->id=Uuid::uuid4();
        $add->nama=$request['nama_produk'];
        if(!$request->file('foto'))
        {
            $add->foto=null;
        }
        else
        {
            // $fotoName   = $request->file('foto')->getClientOriginalName();
            // $fotoExt   = $request->file('foto')->getClientOriginalExtension();
            // $foto_NewName = $request['nama_produk']."." .$fotoExt;
            // if (is_dir('produk/' . $request['nama_produk'])) { } else {
            //   mkdir('produk/' . $request['nama_produk']);
            // }
            // $request->file('foto')->move("produk/" . $request['nama_produk'], $foto_NewName);
        }
        $add->satuan=$request['satuan'];
        $add->kategori=$request['kategori'];
        $add->status=$request['status']; 
        $add->keterangan=$request['keterangan'];
        $add->save();
        Alert::success('Berhasil','Data '.$add->nama_produk.' tersimpan');
        return redirect('Produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('sda');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d = ProdukModel::find($id);
        return view('Produk.form',compact('d'));
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
            'nama_produk' => 'required',
        ]);
        $add =ProdukModel::where('id',$id)->first();

        $add->nama=$request['nama_produk'];
        if(!$request->file('foto'))
        {
            $add->foto=null;
        }
        else
        {
            // $fotoName   = $request->file('foto')->getClientOriginalName();
            // $fotoExt   = $request->file('foto')->getClientOriginalExtension();
            // $foto_NewName = $request['nama_produk']."." .$fotoExt;
            // if (is_dir('produk/' . $request['nama_produk'])) { } else {
            //   mkdir('produk/' . $request['nama_produk']);
            // }
            // $request->file('foto')->move("produk/" . $request['nama_produk'], $foto_NewName);
        }
        $add->satuan=$request['satuan'];
        $add->kategori=$request['kategori'];
        $add->status=$request['status'];
        $add->keterangan=$request['keterangan'];
        $add->update();
        Alert::success('Berhasil','Data telah diubah');
        return redirect('Produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =ProdukModel::find($id);
        $delete->delete();
        Alert::success('Berhasil','Data telah dihapus');
        return redirect('Produk');
    }
    
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("app_produk")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }

    public function varian($id)
    {
        $d= new produkModel;
        \Assets::add('Produk.js');
        return view('Produk.partial.formvarian',compact('d','id'));

    }

    public function varianstore(Request $request)
    {
        $this->validate($request,[
            'value' => 'required',
        ]);
            foreach ($request->value as $value)
            {
                $option_value[]=
                [
                'id'=>Uuid::uuid4(),
                'nama'=>$addup->id,
                'kategori'=>$no,
                'satuan'=>$value,
                'sequence'=>$no];
                $no++;
            }
            ProdukModel::insert($option_value);

            Alert::success('Berhasil','Data varian tersimpan');
            return redirect('Produk');
    
        }

    
}
