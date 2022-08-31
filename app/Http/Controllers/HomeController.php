<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Chef;
use App\Models\Cart;

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

            $user_id = Auth::id();

            //counting the number of times a single user_id appears in the database
            $count = Cart::where('user_id', $user_id)->count();

            return view('home', compact('data', 'chefdata', 'count'));
        }
    }

    //CART FUNCTIONS
    public function addtocart(Request $request, $id){
        if(Auth::id()){
            $user_id = Auth::id();

            $food_id = $id;
            $quantity = $request->quantity;

            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;

            $cart->save();

            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }
}
