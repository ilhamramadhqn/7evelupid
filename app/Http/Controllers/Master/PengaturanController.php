<?php

namespace App\Http\Controllers\Master;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use App\User;
use App\MasterModel\MasterUserModel;
use RealRashid\SweetAlert\Facades\Alert;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d = MasterUserModel::where('nip', Auth::user()->username)->first();
        return view('Master/Pengaturan/default',compact('d'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //

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
        //

        $this->validate($request,[
            'password_lama' => 'required||min:8',
            'password_baru' => 'required||min:8'
        ]);

        $update =User::where('username',$id)->first();
        if (Hash::check($request['password_lama'], $update->password)) {
            $update->password=Hash::make($request['password_baru']);
            $update->update();
            Alert::Success('Berhasil','Password Berhasil Diubah' );
        }else{

            Alert::error( 'Gagal','Password Lama Tidak Sesuai');
        }
        return redirect('Pengaturan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
