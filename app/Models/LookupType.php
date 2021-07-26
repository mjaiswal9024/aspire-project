<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LookupType
 * @package App\Models
 */
class LookupType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'lookup_types';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
    ];

}
