<?php

namespace App\Http\Controllers;

use App\Models\UserLoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoanController
 * @package App\Http\Controllers
 */
class LoanController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function applyLoan (Request $request)
    {
        $userId = Auth::id();

        if ( !$userId )
            return response()->json(['success' => false, 'response' => 'Please login to apply loan']);

        $userLoan = UserLoan::where('user_id', $userId)
            ->whereIn('loan_status_id', [UserLoan::CLOSED, UserLoan::REJECTED])
            ->first();

        if ( $userLoan ) {
            return response()->json(['success' => false, 'response' => 'Found an new/ongoing loan']);
        }

        $userLoan = new UserLoan();
        $userLoan->amount = $request->amount;
        $userLoan->user_id = $userId;
        $userLoan->tenure = $request->tenure;
        $userLoan->loan_status_id = UserLoan::NEW;
        $userLoan->save();

        return response()->json(['success' => true, 'response' => 'Request for loan sent successfully']);
    }

    /**
     * @param $id
     */
    public function approveLoan ($id)
    {
        //update the status of the loan to approved
    }

    /**
     * @param $id
     */
    public function rejectLoan ($id)
    {
        //update the status of the loan to rejected
    }
}
