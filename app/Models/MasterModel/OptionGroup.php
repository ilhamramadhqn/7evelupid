<?php

namespace App\MasterModel;

use App\Traits\TapActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\Activitylog\Traits\LogsActivity;

class OptionGroup extends Model
{
    /**
     * @var string 
     */
    protected $table = 'mst_option_groups';

        public $timestamps=true;
   
    protected   $primaryKey = 'id';
    /**
     * @var array 
     */
    protected $fillable = [
        'id', 'name',
    ];
    
    public $incrementing = false;


    public function scopeFetch($query, $request)
    {
        if ($request->name)
            $query->where('name', 'like', '%' . $request->name . '%');

        if ($request->status)
            $query->where('status', $request->status);


        return $query->orderby('name','asc')->paginate(10);
    }
        public function option_values()
    {
        return $this->hasMany(OptionValue::class)->orderby('sequence','asc');
    }

}
