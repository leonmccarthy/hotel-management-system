<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function redirects(){
        // checking for the usertype from database (admin or normal user)
        $usertype = Auth::user()->usertype;

        if($usertype=='1'){
            return view('admin.admin-home');
        }else{
            return view('home');
        }
    }
}
