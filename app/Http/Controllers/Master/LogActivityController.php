<?php

namespace App\Http\Controllers\Master;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\MasterModel\LogActivityModel;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;
class LogActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:LogActivity.index', ['only' => ['index']]);
        $this->middleware('permission:LogActivity.create', ['only' => ['create','store']]);
        $this->middleware('permission:LogActivity.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:LogActivity.destroy', ['only' => ['destroy','deleteAll']]);
        $this->middleware('permission:LogActivity.print', ['only' => ['export']]);
                // $this->middleware('role:SUPER ADMIN');
    }

    public function index(Request $request)
    {

        $data = LogActivityModel::fetch($request);
        
        return view('Master.LogActivity.default',compact('data',$data));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
       return redirect('LogActivity');
   }


   public function deleteAll(Request $request)
   {
    $ids = $request->ids;
    DB::table("activity_log")->whereIn('id',explode(",",$ids))->delete();

    return response()->json(['success'=>"Products Deleted successfully."]);
}

}
