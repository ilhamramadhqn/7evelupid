<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class MenuModel extends Model
{
    use logsActivity;

	protected	$table ='mst_menu';
    
    protected static $logAttributes = ['*'];


	protected 	$primaryKey = 'id';
	protected	$fillable = ['nama_menu','menu_parent','sequence','status','uri','icon'];


	public $timestamps = false;
	public function scopeFetch($query, $request)
    {
        if ($request->nama_menu)
            $query->where('nama_menu', 'like', '%'.$request->nama_group.'%');
        if ($request->status)
            $query->where('status','like', '%'.$request->status.'%');
        return $query->where('menu_parent',0)->orderby('sequence','asc')->paginate(10);
    }


    public function child()
    {
        return $this->hasMany('App\MasterModel\MenuModel', 'menu_parent', 'id')->orderby('sequence','asc');
    }



}
