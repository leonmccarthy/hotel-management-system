<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function index(){
        $chefdata = Chef::all();
        $data = Food::all();
        // $count = Cart::where('user_id', $id)->count();
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

    public function showcart($id){
        if(Auth::id()){
            $count = Cart::where('user_id', $id)->count();

        if(Auth::id()==$id){
            $data = Cart::where('user_id', $id)->join('food', "carts.food_id", "=", "food.id")->get();
            $cart = Cart::select('*')->where('user_id', '=' , $id)->get();
            return view("showcart", compact('count', 'data', 'cart'));
        }else{
            return redirect()->back();
        }
        }else{
            return redirect()->back();
        }    
        
    }

    public function removeorder($id){
        if(Auth::id()){
            $cart = Cart::find($id);
            $cart->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function confirmorder(Request $request){
        if(Auth::id()){
            foreach($request->foodname as $key=>$foodname){
                $order = new Order();
    
                $order->foodname = $foodname;
                $order->price = $request->price[$key];
                $order->quantity = $request->quantity[$key];
                $order->name = $request->name;
                $order->phone = $request->phone;
                $order->address = $request->address;
    
                $order->save();
            }
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
}
