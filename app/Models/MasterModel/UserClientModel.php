<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class UserClientModel extends Model
{
    //
    use logsActivity;
    protected static $logAttributes = ['id'];


	protected		$table ='mst_user';
	protected 	$primaryKey = 'id';
	protected	$fillable = [
		'nip',
		'ktp',
		'nama',
		'email',
		'tgl_lahir',
		'jk',
		'alamat',
		'no_telp',
		'jenjang',
		'pendidikan',
		'gelar',
		'foto',
		'nama_ayah',
		'nama_ibu',
		'agama',
		'id_posisi',
		'id_posisi_parent',
		'id_divisi',
		'status',
		'created_at',
		'updated_at'];

		public $timestamps = true;
		public $incrementing = false;


		public function scopeFetch($query, $request)
		{
			$query->where('nip','!=','1111')->orderby('nama','asc');
			if ($request->nip)
				$query->where('nip', 'like', '%'.$request->nip.'%');
			if ($request->nama)
				$query->where('nama','like', '%'.$request->nama.'%');
			return $query->paginate(10);
		}

	}
