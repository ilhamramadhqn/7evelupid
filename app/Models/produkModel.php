<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class ProdukModel extends Model
{
    use logsActivity;

	protected	$table ='app_produk';
    
    protected static $logAttributes = ['*'];


    protected $keyType = 'string';
	protected 	$primaryKey = 'id';
    protected	$fillable = ['nama','foto','kategori','status'];
    


	public $timestamps = true;
	public function scopeFetch($query, $request)
    {
        if ($request->nama_produk)
            $query->where('nama', 'like', '%'.$request->nama_produk.'%');
        if ($request->status)
            $query->where('status','like', '%'.$request->status.'%');
        return $query->orderby('nama','asc')->paginate(10);
    }



}
