<?php

namespace App\Http\Controllers\Patient;

use App\Appointment;
use App\Department;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_appointment = Appointment::where('user_id',Auth::user()->id)->get();
        return view('backend.patient.appointment.index',compact('all_appointment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::where('status',1)->get();
        $doctors = User::where('role_id',3)->get();
        return view('backend.patient.appointment.create',compact('departments','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment_count = Appointment::whereDate('created_at',$request->date)->where('doctor_id',$request->doctor_id)->count();
        $doctor = User::find($request->doctor_id);
        if($appointment_count<$doctor->patient_per_day){
            $appointment = new Appointment();
            $appointment->user_id = Auth::user()->id;
            $appointment->department_id = $request->department_id;
            $appointment->doctor_id = $request->doctor_id;
            $appointment->date = $request->date;
            $appointment->time = $request->time;
            $appointment->name = $request->name;
            $appointment->phone = $request->phone;
            $appointment->message = $request->message;
            $appointment->save();
            $notification=array(
                'message' => 'Successfully Saved',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return back()->with('error',"Appointment List Full Your selected date.please Select another date !");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::where('status',1)->get();
        $doctors = User::where('role_id',3)->get();
        $data = Appointment::find($id);
        return view('backend.patient.appointment.edit',compact('departments','doctors','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->user_id = Auth::user()->id;
        $appointment->department_id = $request->department_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->name = $request->name;
        $appointment->phone = $request->phone;
        $appointment->message = $request->message;
        $appointment->update();
        $notification=array(
            'message' => 'Successfully Update',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        $notification=array(
            'message' => 'Successfully Delete',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
