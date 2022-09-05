<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservastion;
use App\Models\Chef;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // USER FUNCTIONS
    public function user(){
        if(Auth::id()){
            if(Auth::user()->usertype==="1"){
                $data = User::all();
                return view('admin.user', compact("data"));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
        
    }

    public function deleteUser($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }

    //FOOD MENU FUNCTIONS
    public function foodmenu(){
        if(Auth::id()){
            if(Auth::user()->usertype==="1"){
                $fooddata = Food::all();
                return view('admin.admin-foodmenu', compact("fooddata"));
            }
        }else{
            return redirect()->back();
        }
        
    }

    public function uploadfood(Request $request){
        $data = new Food();
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect()->back();
    }

    public function deletefood($id){
        $fooddata = Food::find($id);
        $fooddata->delete();
        return redirect()->back();
    }

    public function updatefoodview($id){
        if(Auth::id()){
            if(Auth::user()->usertype==="1"){
                $fooddata = Food::find($id);
                return view('admin.admin-updatefood', compact('fooddata'));
            }
        }else{
            return redirect()->back();
        }
    }

    public function updatefoodaction( Request $request, $id){
        $fooddata = Food::find($id);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $fooddata->image = $imagename;
        $fooddata->title = $request->title;
        $fooddata->price = $request->price;
        $fooddata->description = $request->description;
        $fooddata->save();

        return redirect()->back();
    }

    //RESERVATION FUNCTIONS
    public function makereservation(Request $request){
        $data = new Reservastion;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();

        return redirect()->back();
    }

    public function viewreservations(){
        if(Auth::id()){
            if(Auth::user()->usertype==="1"){
                $reservationdata = Reservastion::all();
                return view('admin.admin-reservation', compact('reservationdata'));
            }
        }else{
            return redirect()->back();
        }
        
    }

    //CHEF FUNCTIONS
    public function uploadchef(Request $request){
        $chef = new Chef;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        $chef->image = $imagename;
        $chef->name = $request->name;
        $chef->speciality = $request->speciality;
        $chef->save();
        return redirect()->back();
    }

    public function viewchefs(){
        if(Auth::id()){
            if(Auth::user()->usertype==="1"){
                $chefdata = Chef::all();
                return view('admin.admin-chefs', compact('chefdata'));
            }
        }else{
            return redirect()->back();
        }
        
    }

    public function updatechefview($id){
        if(Auth::id()){
            if(Auth::user()->usertype==="1"){
                $chefdata = Chef::find($id);
                return view('admin.admin-updatechefs', compact('chefdata'));
            }
        }else{
            return redirect()->back();
        }
        
    }

    public function updatechefaction(Request $request, $id){
        $chefdata = Chef::find($id);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        $chefdata->image = $imagename;
        $chefdata->name = $request->name;
        $chefdata->speciality = $request->speciality;
        $chefdata->save();
        return redirect()->back();
    }

    public function deletechef($id){
        $chefdata = Chef::find($id);
        $chefdata->delete();
        return redirect()->back();
    }

    //ORDER FUNCTIONS
    public function vieworders(){
        if(Auth::id()){
            if(Auth::user()->usertype==="1"){
                $orders = Order::all();
                return view('admin.admin-orders', compact('orders'));
            }
        }else{
            return redirect()->back();
        }
        
    }

    public function search(Request $request){
        $search = $request->search;
        $orders = Order::where('name', 'Like', '%'.$search.'%')->
        orWhere('foodname', 'Like', '%'.$search.'%')->get();
        return view('admin.admin-orders', compact('orders'));
    }

}
