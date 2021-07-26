<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signUp (Request $request)
    {
        $request->validate([
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:4|max:10',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['success' => true, 'response' => $user]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login (Request $request)
    {
        $login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ( $login ) {
            $request->session()->regenerate();

            return response()->json(['success' => true, 'response' => 'login successful']);
        } else
            return response()->json(['success' => false, 'response' => 'login failed']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout ()
    {
        Auth::logout();

        return response()->json(['success' => true, 'response' => 'logout successful']);
    }
}
