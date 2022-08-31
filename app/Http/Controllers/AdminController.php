<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservastion;
use App\Models\Chef;

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
        $chefdata = Chef::all();
        return view('admin.admin-chefs', compact('chefdata'));
    }

    public function updatechefview($id){
        $chefdata = Chef::find($id);
        return view('admin.admin-updatechefs', compact('chefdata'));
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
}
