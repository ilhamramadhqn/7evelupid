<?php

namespace App\MasterModel\Relasi;

use Illuminate\Database\Eloquent\Model;

class VwMenuModel extends Model
{
    //
	protected	$table ='vw_menu';

	protected 	$primaryKey = 'id';
	protected	$fillable = ['id','nama_menu','menu_parent','sequence','status','uri','icon','role_id'];


	public $timestamps = false;

	public function child()
    {
        return $this->hasMany('App\MasterModel\MenuModel', 'menu_parent', 'id')->orderby('sequence','asc');
    }

}
