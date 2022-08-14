<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class LogActivityModel extends Model
{
    //
	protected	$table ='activity_log';
	protected 	$primaryKey = 'id';

	protected $fillable = [
		'subject', 'url', 'method', 'ip', 'agent', 'user_id'
	];

	public function scopeFetch($query, $request)
	{
		if ($request->tanggal)
			$query->wheredate('created_at',date_formatted($request->tanggal,'%Y-%m-%e'));
                
		if ($request->status)
			$query->where('description',$request->status);
		return $query->orderby('created_at','desc')->paginate(10);
	}

}
