<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffAuthController extends Controller
{
    function create(){
        return view('staff_login');
    }

    function authenticate(Request $request){
        $attributes = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $remember = $request->remember_me;

        if (auth()->guard('staff')->attempt($attributes, $remember)) {
            return redirect()->route('admin.menus');
        }
        return redirect()->back()->withInput();
    }

    function destroy(){
        auth()->guard('staff')->logout();
        return view('staff_login');
    }
}
