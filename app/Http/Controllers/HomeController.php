<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;

class HomeController extends Controller
{
    public function index(){
        $data = Food::all();
        return view('home', compact("data"));
    }

    public function redirects(){
        // checking for the usertype from database (admin or normal user)
        $usertype = Auth::user()->usertype;
        $data = Food::all();

        if($usertype=='1'){
            return view('admin.admin-home');
        }else{
            return view('home', compact("data"));
        }
    }
}
