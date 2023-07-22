<?php

namespace App\Http\Controllers\Frontend;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Doctor;
use App\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $doctors = User::where('status',1)->where('role_id',3)->get();
        $departments = Department::where('status',1)->get();
        return view('frontend.layouts.home',compact('doctors','departments'));
    }

    public function aboutUs()
    {
        return view('frontend.single_pages.about-us');
    }

    public function contactUs()
    {
        return view('Frontend.single_pages.contact-us');
    }

    public function service()
    {
        return view('frontend.single_pages.service');
    }
    public function get_doctor(Request $request){
        $doctor = User::find($request->doctor_id);
        return response(
            $data = $doctor,
        );
    }
    public function admin_login(){
        return view('auth.admin_login');
    }
    public function get_doctor_list(Request $request){
        $doctors = User::where('department_id',$request->department_id)->where('role_id',3)->get();
        return view('frontend.layouts.doctor_list',compact('doctors'));
    }
    public function doctorList(){
        return view('frontend.single_pages.doctor_list');
    }
}
