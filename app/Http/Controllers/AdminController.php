<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservastion;

class AdminController extends Controller
{
    public function user(){
        $data = User::all();
        return view('admin.user', compact("data"));
    }

    public function deleteUser($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu(){
        $fooddata = Food::all();
        return view('admin.admin-foodmenu', compact("fooddata"));
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
        $fooddata = Food::find($id);
        return view('admin.admin-updatefood', compact('fooddata'));
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
        $reservationdata = Reservastion::all();
        return view('admin.admin-reservation', compact('reservationdata'));
    }
}
