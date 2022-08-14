<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class PermissionModel extends Model
{
	protected	$table ='permissions';
	protected 	$primaryKey = 'id';
	protected	$fillable = [
		'name',
		'guard_name',
		'id_menu',
		'created_at',
		'updated_at'
	];

	public $timestamps = true;
	public $incrementing = false;
}
