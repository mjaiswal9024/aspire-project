<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserLoan
 * @package App\Models
 */
class UserLoan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'user_loans';

    /**
     *
     */
    const NEW = 1;

    /**
     *
     */
    const APPROVED = 2;

    /**
     *
     */
    const CLOSED = 3;

    /**
     *
     */
    const REJECTED = 4;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan_status ()
    {
        return $this->belongsTo(LookupValue::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loan_payments ()
    {
        return $this->hasMany(LoanPayment::class, 'loan_id')->where('status_id', LoanPayment::PAID);
    }
}
