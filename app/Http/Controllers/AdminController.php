<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;

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
}
