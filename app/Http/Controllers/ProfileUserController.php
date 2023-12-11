<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\categorys;
use App\Models\Detail_Orders;
use Illuminate\Support\Facades\Auth;
class ProfileUserController extends Controller
{
    public function profile(){
        $category = categorys::all();
        $User = Auth::user();
        $orders = Orders::where('id_user', $User->id)->get();
        return view('User.Auth.profile', compact('category', 'User', 'orders'));
    }

    public function UpdateUser(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg,gif|max:5000',
        ]);

        $User = User::find($id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->no_hp = $request->no_hp;
        $User->alamat = $request->alamat;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $destination = public_path().'/assets/images/profile_user/';

            if(!file_exists($destination)){
                mkdir($destination, 0777, true);
            }

            $file->move($destination, $fileName);
            $User->image = $fileName;
        }
        $User->save();

        if($User){
            return redirect()->back()->with('success', 'Profile Updated');
        }else{
            return redirect()->back()->with('faild', 'Profile Update faild');
        }
    }
}
