<?php

namespace App\Http\Controllers\Receptionist;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.receptionist.home');
    }
    public function profile(){
        $data = Auth::user();
        return view('backend.receptionist.profile',compact('data'));
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
        return view('backend.receptionist.change_pass');
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
    public function doctor_list(){
        $doctors = User::where('role_id',3)->orderBy('id','desc')->get();
        return view('backend.receptionist.doctor_list',compact('doctors'));
    }
    public function patient_list(){
        $patients = User::where('role_id',2)->orderBy('id','desc')->get();
        return view('backend.receptionist.patient_list',compact('patients'));
    }
    public function appointment_list(){
        $all_appointment = Appointment::orderBy('id','desc')->get();
        return view('backend.receptionist.appointment_list',compact('all_appointment'));
    }
}
