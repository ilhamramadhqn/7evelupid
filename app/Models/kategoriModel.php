<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class KategoriModel extends Model
{
    use logsActivity;

	protected	$table ='mst_option_values';
    
    protected static $logAttributes = ['*'];


	protected 	$primaryKey = 'id';
    protected	$fillable = ['key','value','status'];
    
    protected $keyType = 'string';

	public $timestamps = true;
	public function scopeFetch($query, $request)
    {
        if ($request->nama_kategori)
            $query->where('value', 'like', '%'.$request->nama_kategori.'%');        
        if ($request->status)
            $query->where('status',$request->status);

        return $query->where('option_group_id','d520d705-a5bc-4915-813d-56ea13b8d0e2')->orderby('value','asc')->paginate(10);
    }



}
