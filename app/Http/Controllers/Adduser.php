<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Adduser extends Controller
{
    function adduser(Request $request ){
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required | min: 8',
            'program' => 'required',
            'zip_code' => 'required',
        ],[
        'first_name.required' => 'First name required',
        'last_name.required' => 'Last name required',
        'email.email' => 'Email not valid',
        'password.required' => 'password required',
    ]);
    }
}
