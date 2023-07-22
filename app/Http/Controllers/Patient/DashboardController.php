<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Prescription;
use App\User;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.patient.home');
    }
    public function doctorlist(){
        $doctors = User::where('role_id',3)->get();
        return view('backend.patient.doctor.index',compact('doctors'));
    }
    public function prescription_list(){
        $prescription = Prescription::where('patient_id',Auth::user()->id)->get();
        return view('backend.patient.prescription',compact('prescription'));
    }
    public function change_password(){
        return view('backend.patient.change_pass');
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
    public function profile (){
        return view('backend.patient.profile');
    }
    public function update_profile(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        if($user->email==$request->email){
            $user->email = $request->email;
        }
        
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();
        return redirect()->back()->with('message',"Profile Updated successfully");
    }

}
