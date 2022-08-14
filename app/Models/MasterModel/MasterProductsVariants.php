<?php

namespace App\MasterModel;

use App\Traits\TapActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class MasterProductsVariantsModel extends Model
{

    /**
     * @var string
     */
    protected $table = 'mst_products_variants';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'mst_products_id', 'key', 'value', 'sequence',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected static $logAttributes = [
        'mst_products_id', 'key', 'value', 'sequence', 
    ];
    public $timestamps = true;

    /**
     * @param string $eventName
     * @return string
     */
    public function getDescriptionForEvent(string $eventName): string
    {
        $item = ($eventName !== 'deleted' ? $this->attributesToArray() : $this->getOriginal());

        return $item['key'] . ' - ' . $item['value'] . ' from Products Variants has been ' . $eventName . '.';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mst_products()
    {
        return $this->belongsTo(MasterProductsModel::class);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */

}
