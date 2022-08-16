<?php

namespace App\Http\Controllers\Master;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Models\MasterModel\MasterProductsModel;
use App\Models\MasterModel\MasterProductsVariantsModel;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

use Ramsey\Uuid\Uuid;
class MasterProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:MasterGames.index', ['only' => ['index']]);
        $this->middleware('permission:MasterGames.create', ['only' => ['create','store']]);
        $this->middleware('permission:MasterGames.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:MasterGames.destroy', ['only' => ['destroy','deleteAll']]);
        $this->middleware('permission:MasterGames.print', ['only' => ['export']]);
    }

    public function index(Request $request)
    {
        $data = MasterProductsModel::fetch($request);
        
        return view('Master.MasterProducts.default',compact('data',$data));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d = new  MasterProductsModel;
        \Assets::add('MasterProducts.js');

        return view('Master.MasterProducts.form',compact('d'));
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
          'name' => 'required',
      ]);

        
        $addup =new MasterProductsModel();

        $addup->id= Uuid::uuid4();
        $addup->name=$request['name'];
        $addup->status=$request['status'];
        $addup->save();

        $no=1;

        if(!$request->value)
        {
            Alert::success('Berhasil','Data '.$addup->name.' tersimpan');
            return redirect('MasterProducts');

        }
        else
        {
            foreach ($request->value as $value)
            {
                $master_products_variants[]=
                [
                'id'=>Uuid::uuid4(),
                'option_group_id'=>$addup->id,
                'key'=>$no,
                'value'=>$value,
                'sequence'=>$no];
                $no++;
            }
            OptionValue::insert($master_products_variants);

            Alert::success('Berhasil','Data '.$addup->name.' tersimpan');
            return redirect('MasterProducts');
    
        }

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
        $d = MasterProductsModel::find($id);
        \Assets::add('MasterProducts.js');
        return view('Master.MasterProducts.form',compact('d'));
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
            'name' => 'required',
        ]);
        $addup= MasterProductsModel::find($id);;

        $addup->name=$request['name'];
        $addup->status=$request['status'];
        $addup->update();

        $addup_value=OptionValue::where('option_group_id',$id);
        $addup_value->delete();
        
        $no=1;

        if(!$request->value)
        {
            Alert::success( 'Berhasil','Data telah diubah');
            return redirect('MasterProducts');    
        
        }
        else
        {
            foreach ($request->value as $value)
            {
                $master_products_variants[]=
                [
                'id'=>Uuid::uuid4(),
                'option_group_id'=>$addup->id,
                'key'=>$no,
                'value'=>$value,
                'sequence'=>$no];
                $no++;
            }
            OptionValue::insert($master_products_variants);
            Alert::success( 'Berhasil','Data telah diubah');
            return redirect('MasterProducts');    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $delete =MasterProductsModel::find($id);
     $delete->delete();

     Alert::success('Berhasil','Data telah dihapus');
     return redirect('MasterProducts');
 }


 public function deleteAll(Request $request)
 {
    $ids = $request->ids;
    DB::table("mst_option_groups")->whereIn('id',explode(",",$ids))->delete();

    return response()->json(['success'=>"Products Deleted successfully."]);
}

}
