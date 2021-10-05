<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    //

    /**
     * This method will sign in a user
     * 
     *  */    
    public function login( Request $request ){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials,true)) {
     


            return auth()->user();
        // Authentication passed...
            return redirect('/api/user');
        } else {
            abort(404);
        }


    }
}
