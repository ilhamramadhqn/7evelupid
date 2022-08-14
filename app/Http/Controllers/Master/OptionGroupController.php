<?php

namespace App\Http\Controllers\Master;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\MasterModel\OptionGroup;
use App\MasterModel\OptionValue;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

use Ramsey\Uuid\Uuid;
class OptionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:OptionGroup.index', ['only' => ['index']]);
        $this->middleware('permission:OptionGroup.create', ['only' => ['create','store']]);
        $this->middleware('permission:OptionGroup.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:OptionGroup.destroy', ['only' => ['destroy','deleteAll']]);
        $this->middleware('permission:OptionGroup.print', ['only' => ['export']]);
    }

    public function index(Request $request)
    {
        $data = OptionGroup::fetch($request);
        
        return view('Master.OptionGroup.default',compact('data',$data));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d = new  OptionGroup;
        \Assets::add('OptionGroup.js');

        return view('Master.OptionGroup.form',compact('d'));
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

        
        $addup =new OptionGroup();

        $addup->id= Uuid::uuid4();
        $addup->name=$request['name'];
        $addup->status=$request['status'];
        $addup->save();

        $no=1;

        if(!$request->value)
        {
            Alert::success('Berhasil','Data '.$addup->name.' tersimpan');
            return redirect('OptionGroup');

        }
        else
        {
            foreach ($request->value as $value)
            {
                $option_value[]=
                [
                'id'=>Uuid::uuid4(),
                'option_group_id'=>$addup->id,
                'key'=>$no,
                'value'=>$value,
                'sequence'=>$no];
                $no++;
            }
            OptionValue::insert($option_value);

            Alert::success('Berhasil','Data '.$addup->name.' tersimpan');
            return redirect('OptionGroup');
    
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
        $d = OptionGroup::find($id);
        \Assets::add('OptionGroup.js');
        return view('Master.OptionGroup.form',compact('d'));
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
        $addup= OptionGroup::find($id);;

        $addup->name=$request['name'];
        $addup->status=$request['status'];
        $addup->update();

        $addup_value=OptionValue::where('option_group_id',$id);
        $addup_value->delete();
        
        $no=1;

        if(!$request->value)
        {
            Alert::success( 'Berhasil','Data telah diubah');
            return redirect('OptionGroup');    
        
        }
        else
        {
            foreach ($request->value as $value)
            {
                $option_value[]=
                [
                'id'=>Uuid::uuid4(),
                'option_group_id'=>$addup->id,
                'key'=>$no,
                'value'=>$value,
                'sequence'=>$no];
                $no++;
            }
            OptionValue::insert($option_value);
            Alert::success( 'Berhasil','Data telah diubah');
            return redirect('OptionGroup');    
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
     $delete =OptionGroup::find($id);
     $delete->delete();

     Alert::success('Berhasil','Data telah dihapus');
     return redirect('OptionGroup');
 }


 public function deleteAll(Request $request)
 {
    $ids = $request->ids;
    DB::table("mst_option_groups")->whereIn('id',explode(",",$ids))->delete();

    return response()->json(['success'=>"Products Deleted successfully."]);
}

}
