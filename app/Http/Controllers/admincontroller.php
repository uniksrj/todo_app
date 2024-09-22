<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admincontroller extends Controller
{
    function adminpanel($name){
        $data['user'] = $name;
        return view('adminpage',$data);
    }

    function userpanel(){
        $data['data'] = ['suraj','raj','admin'];
        return view('user.userlist',$data);
    }
    
}
