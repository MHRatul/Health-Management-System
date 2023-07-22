<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use Illuminate\Http\Request;
use Auth;

class AppointmentController extends Controller
{
    public function store(Request $request){
        $appointment_count = Appointment::whereDate('created_at',$request->date)->where('doctor_id',$request->doctor_id)->count();
        $doctor = User::find($request->doctor_id);
        if($appointment_count<$doctor->patient_per_day){
            $appointment = new Appointment();
            if(Auth::user()){
                $appointment->user_id = Auth::user()->id;
            }
            $appointment->department_id = $request->department_id;
            $appointment->doctor_id = $request->doctor_id;
            $appointment->date = $request->date;
            $appointment->time = $request->time;
            $appointment->name = $request->name;
            $appointment->phone = $request->phone;
            $appointment->message = $request->message;
            $appointment->save();
            return back()->with('message',"Appointment Created Successfully");
            
        }else{
            return back()->with('error',"Appointment List Full Your selected date.please Select another date !");
        }
        
    }
    public function pending_appointment($id){
        $appointment = Appointment::find($id);
        $appointment->status = 2;
        $appointment->update();
        return back()->with('message',"Appointment Cancelled");
    }
    public function complete_appointment($id){
        $appointment = Appointment::find($id);
        $appointment->status = 1;
        $appointment->update();
        return back()->with('message',"Appointment Completed");
    }
}
