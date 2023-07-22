<?php

namespace App\Http\Controllers\Backend;

use App\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function pending_appointment(){
        $all_pending = Appointment::where('status',0)->get();
        return view('backend.admin.appointment.pending',compact('all_pending'));
    }
    public function all_appointment(){
        $all_appointment = Appointment::orderBy('id','desc')->get();
        return view('backend.admin.appointment.all',compact('all_appointment'));
    }
}
