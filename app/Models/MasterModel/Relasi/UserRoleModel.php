<?php

namespace App\MasterModel\Relasi;

use Illuminate\Database\Eloquent\Model;

class UserRoleModel extends Model
{
    //
	protected	$table ='model_has_roles';

	protected 	$primaryKey = 'model_id';
	protected	$fillable = ['role_id','model_type','model_id'];


	public $timestamps = false;


}
