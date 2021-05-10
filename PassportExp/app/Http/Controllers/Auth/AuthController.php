<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    public function LoginPage()
    {       
        if(Auth::check())
        {
            //role göre route ekle  return redirect()->route('Auth.LoginPage')->with('status','logouted');
            return redirect()->route('Auth.LoginPage')->with('status','logouted');
            
        }    
       return view('Auth.Login');
    }

    public function Login(LoginRequest $request)
    {    
         
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {
             return view('Backend.Dashboard');
        }  
       return back()->with('status','wrong informations');
      
    }

    public function Logout()
    {          
        Auth::logout();
        return redirect()->route('Auth.LoginPage')->with('status','logout');
    }
    
    public function Register()
    {

        //yapılacak
        return "ok3";    
       // Auth::logout();
    }
}