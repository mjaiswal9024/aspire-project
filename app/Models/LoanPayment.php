<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LoanPayment
 * @package App\Models
 */
class LoanPayment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     *
     */
    const PENDING = 5;
    /**
     *
     */
    const PAID = 6;
    /**
     *
     */
    const MISSED = 7;

    /**
     * @var string
     */
    protected $table = 'loan_payments';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan ()
    {
        return $this->belongsTo(UserLoan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status ()
    {
        return $this->belongsTo(LookupValue::class);
    }
}
