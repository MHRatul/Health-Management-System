<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

class DashboardController extends Controller
{
    public function edit_profile(){
        return view('backend.admin.profile');
    }
    public function update_profile(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('message',"Profile Updated successfully");
    }
    public function change_password(){
        return view('backend.admin.change_pass');
    }
    public function update_password(Request $request){
        
        $id = Auth::user()->id;
        $data = User::where('id',$id)->first();
        if($request->old_password){
            
            $validatedData = $request->validate([
                'password' => 'min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6'
            ]);
            if (!(Hash::check($request->get('old_password'), $data->password))) {
                return redirect()->back()->with('message',"Your current password does not matches with the password you provided. Please try again.");
                // The passwords matches
            }
            $data->password = bcrypt($request->password);
        }
        $data->save();
        return redirect()->back()->with('message',"Your Password Updated successfully.");
    }
}
