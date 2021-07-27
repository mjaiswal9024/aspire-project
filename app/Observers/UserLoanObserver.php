<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class UserLoanObserver
 * @package App\Observers
 */
class UserLoanObserver
{
    /**
     * @param Eloquent $model
     */
    public function updated (Eloquent $model)
    {
        if ( $model->getOriginal('loan_status_id') == UserLoan::NEW && $model->loan_status_id == APPROVED ) {

            //create loan payment record
        }
    }
}

