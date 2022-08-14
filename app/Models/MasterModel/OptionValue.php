<?php

namespace App\MasterModel;

use App\Traits\TapActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class OptionValue extends Model
{

    /**
     * @var string
     */
    protected $table = 'mst_option_values';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'option_group_id', 'key', 'value', 'sequence',
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
        'option_group_id', 'key', 'value', 'sequence', 
    ];
    public $timestamps = true;

    /**
     * @param string $eventName
     * @return string
     */
    public function getDescriptionForEvent(string $eventName): string
    {
        $item = ($eventName !== 'deleted' ? $this->attributesToArray() : $this->getOriginal());

        return $item['key'] . ' - ' . $item['value'] . ' from Option Value has been ' . $eventName . '.';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option_group()
    {
        return $this->belongsTo(OptionGroup::class);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */

}
