<?php

namespace App\Http\Controllers\Doctor;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Prescription;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Image;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.doctor.home');
    }
    public function appointment(){
        $all_appointment = Appointment::where('doctor_id',Auth::user()->id)->get();
        return view('backend.doctor.appointment.index',compact('all_appointment'));
    }
    public function pending_appointment($id){
        $appointment = Appointment::find($id);
        $appointment->status = 2;
        $appointment->update();
        return back()->with('message',"Appointment Pending");
    }
    public function complete_appointment($id){
        $appointment = Appointment::find($id);
        $appointment->status = 1;
        $appointment->update();
        return back()->with('message',"Appointment Completed");
    }
    public function add_prescription($id){
        $appointment = Appointment::find($id);
        $patient = User::find($appointment->user_id);
        return view('backend.doctor.prescription.create',compact('appointment'));
    }
    public function  prescription_store(Request $request){
        $data = new Prescription();
        $data->doctor_id = Auth::user()->id;
        $data->appointment_id = $request->appointment_id;
        $data->patient_id = $request->patient_id;
        $data->appointment_id = $request->appointment_id;
        $data->guidelines = $request->guidelines;
        if ($request->hasFile('file')) {
            $image = $request->file;
            $filename = $image->getClientOriginalName();
            $filename = preg_replace('/\s+/', '-', $filename);
            $folder = 'uploads/'.date('Y').'/'.date('m');
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $feture_img = $folder.'/'. time() . '-' . $filename;
            Image::make($image)->save($feture_img);
            $data->file = asset($feture_img);
           
        }
        $data->save();
        return redirect()->back()->with('message',"Prescription save Successfully.");
    }
    public function patient_list(){
        $patients = Appointment::distinct('user_id')->where('doctor_id',Auth::user()->id)->get();
        return view('backend.doctor.patient',compact('patients'));
    }
    public function prescription_list(){
        $prescription = Prescription::where('doctor_id',Auth::user()->id)->get();
        return view('backend.doctor.prescription.index',compact('prescription'));
    }
    public function change_password(){
        return view('backend.doctor.change_pass');
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
    public function profile(){
        $data = Auth::user();
        return view('backend.doctor.profile',compact('data'));
    }
    public function update_profile(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->available_time = $request->available_time;
        $user->patient_per_day = $request->patient_per_day;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('message',"Profile Updated successfully");
    }
}
