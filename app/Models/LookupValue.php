<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LookupValue
 * @package App\Models
 */
class LookupValue extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'lookup_values';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'value',
        'lookup_type_id',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lookup_type ()
    {
        return $this->belongsTo(LookupType::class);
    }
}
