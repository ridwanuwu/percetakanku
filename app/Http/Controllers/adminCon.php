<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminCon extends Controller
{
    //
    function index(){
        return view('dashboard.admin.index');
    }

    function profile(){
        return view('dashboard.admin.profile');
    }

    function settings(){
        return view('dashboard.admin.settings');
    }
}
