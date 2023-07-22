<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function view()
    {
        $data['allData'] = User::all();
        return view('backend.user.view-user',$data);
    }

    public function add()
    {
        $roles = Role::where('status',1)->where('id','!=',3)->get();
        return view('backend.user.add-user',compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);
        $data  = new User();
        $data->role_id = $request->role_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = bcrypt( $request->password);
        $data->address = $request->address;
        $data->save();
        return redirect()->route('users.view');
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);
        $data  = new User();
        $data->role_id = $request->role_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = bcrypt( $request->password);
        $data->address = $request->address;
        $data->save();
        return redirect()->route('users.view');
    }
    public function nurse_list(){
        $allData = User::where('role_id',4)->orderBy('id','desc')->get();
        return view('Backend.user.nurse_list',compact('allData'));
    }
    public function edit($id){
        $roles = Role::where('status',1)->where('id','!=',3)->get();
        $data = User::find($id);
        return view('backend.user.edit_user',compact('roles','data'));
    }
}
