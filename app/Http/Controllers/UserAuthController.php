<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserAuthController extends Controller
{
    function create(){
        return Inertia::render('auth', ['user' => "Dhee"]);
    }

    function authenticate(Request $request){
        $attributes = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->remember_me;

        if (auth()->guard('user')->attempt($attributes, $remember)) {
            return redirect()->route('user.index');
        }
        return redirect()->back()->with(['message' => "Given credentials not matched with the system"]);
    }

    function destroy(){
        auth()->guard('user')->logout();
        return Inertia::render('guestIndex')->with(['message' => "Logged out"]);
    }
}
