<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('Login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        //buat cek si user udah login
        if (Auth::attempt($credentials)) {
            if(Auth::user()->status != 'active')
            {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken(); 
                Session::flash('status', 'failed');
                Session::flash('message', 'udah masuk, tunggu validasi dari admin');
                return redirect('login');
            }

        }
        $request->session()->regenerate();
        //cek apakah dia admin
        if(Auth::user()->roles_id == 1)
        {
            return redirect('dashboard');
        }

        //cek apakah dia client
        if(Auth::user()->roles_id == 2)
        {
            return redirect('profile');
        }

        //kalo ini gagal login
        Session::flash('status', 'failed');
        Session::flash('message', 'invalid login');
        return redirect('login');
    

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();     
        return redirect('login');
       
    }

    public function register()
    {
        return view ('register');
    }

    public function regis(Request $request)
    {
        //validate data masuk atu tidak
        $validated = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:5',
            'phone' => 'required|max:13',
            'address' => 'required|max:255',
        ]);

        $request['password'] =  Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Regis Success! please, wait admin to approve' );
        return redirect('register');
    
    }

}
