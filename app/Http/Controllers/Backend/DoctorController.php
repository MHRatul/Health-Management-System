<?php

namespace App\Http\Controllers\Backend;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use Image;

class DoctorController extends Controller
{
    public function view()
    {
        $data['allData'] = User::where('role_id',3)->get();
        return view('backend.admin.doctor.view-doctor',$data);
    }
    public function add(){
        $departments = Department::get();
        return view('backend.admin.doctor.create',compact('departments'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);
        $data  = new User();
        $data->role_id = 3;
        $data->department_id = $request->department_id;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->available_time = $request->available_time;
        $data->patient_per_day = $request->patient_per_day;  
        $data->password = bcrypt( $request->password);
        $data->address = $request->address;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = $image->getClientOriginalName();
            $filename = preg_replace('/\s+/', '-', $filename);
            $folder = 'uploads/'.date('Y').'/'.date('m');
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $feture_img = $folder.'/'. time() . '-' . $filename;
            Image::make($image)->save($feture_img);
            $data->image = asset($feture_img);
           
        }
        $data->save();
        return redirect()->route('doctor.view');
    }
    public function edit($id){
        $departments = Department::get();
        $data = User::find($id);
        return view('backend.admin.doctor.edit',compact('departments','data'));
    }
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $data  = User::find($id);
        $data->role_id = 3;
        $data->department_id = $request->department_id;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->available_time = $request->available_time;
        $data->patient_per_day = $request->patient_per_day;     
        $data->address = $request->address;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = $image->getClientOriginalName();
            $filename = preg_replace('/\s+/', '-', $filename);
            $folder = 'uploads/'.date('Y').'/'.date('m');
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $feture_img = $folder.'/'. time() . '-' . $filename;
            Image::make($image)->save($feture_img);
            $data->image = asset($feture_img);
           
        }
        $data->update();
        return redirect()->route('doctor.view');
    }
    public function delete($id){
        
        $appoint = Appointment::where('doctor_id',$id)->first();
        if(empty($appoint)){
            $doctor = User::find($id);
            $doctor->delete();
            return redirect()->back()->with('message',"Successfully delete");
        }else{
            return redirect()->back()->with('error',"Don't Delete ! This user have an another table");
        }
        
    }
}
