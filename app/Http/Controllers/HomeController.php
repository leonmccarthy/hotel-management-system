<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Chef;

class HomeController extends Controller
{
    public function index(){
        $chefdata = Chef::all();
        $data = Food::all();
        return view('home', compact('data', 'chefdata'));
    }

    public function redirects(){
        // checking for the usertype from database (admin or normal user)
        $usertype = Auth::user()->usertype;
        $data = Food::all();
        $chefdata = Chef::all();

        if($usertype=='1'){
            return view('admin.admin-home');
        }else{
            return view('home', compact('data', 'chefdata'));
        }
    }
}
