<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;

class AdminLoginController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest:admin');
	}

    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }

    public function showRegisterForm()
    {
        return view('auth.admin-register');
    }

    public function login(Request $request)
    {
    	//validation
    	$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6'
    	]);

    	//attempt

    	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password] , $request->remember)) 
    	{
    		return redirect()->intended(route('admin.dashboard'));
    	}

    	return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function register(Request $request)
    {
        //validation
        $this->validate($request, [
            'email'=> 'required|unique:users|email|max:255',
            'name'=>  'required',
            'password'=> 'required|min:6|confirmed'
        ]);

        $email = $request->email;
        $password = $request->password;

        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'type'=> $request->type
        ]); 

        //attempt

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password] , $request->remember)) 
        {
            return redirect()->intended(route('admin.dashboard'));
        }
        else
        {
            return redirect()->back()->with('warning', 'Invalid Credentials');
        }
    }

}
