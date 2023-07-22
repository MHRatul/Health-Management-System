<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($request->login_as==2){
            $user = User::where('email',$request->email)->where('role_id',2)->first();

            if($user){
                if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
                {
                    if (auth()->user()->role_id == 2) {
                        return redirect()->route('patient.dashboard');
                    }
                }
            }else{
                return redirect()->route('login')
                    ->with('error','Email-Address And Password Are Wrong.');
            }
        }elseif($request->login_as==3){
            $user = User::where('email',$request->email)->where('role_id',3)->first();

            if($user){
                if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
                {
                    if (auth()->user()->role_id == 3) {
                        return redirect()->route('doctor.dashboard');
                    }
                }
            }else{
                return redirect()->route('login')
                    ->with('error','Email-Address And Password Are Wrong.');
            }
        }else{
            if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
            {
                if(auth()->user()->role_id == 1){
                    return redirect()->route('home');
                }else
                if(auth()->user()->role_id == 4){
                    return redirect()->route('nurse.dashboard');
                }
                elseif(auth()->user()->role_id == 5){
                    return redirect()->route('receptionist.dashboard');
                }
                elseif(auth()->user()->role_id == 6){
                    return redirect()->route('laboratories.dashboard');
                }
                
            }else{
                return redirect()->route('login')
                    ->with('error','Email-Address And Password Are Wrong.');
            }
        }
        
        
        
          
    }
}
