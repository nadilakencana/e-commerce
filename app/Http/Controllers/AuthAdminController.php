<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admins;
use App\Models\User;
class AuthAdminController extends Controller
{
    // auth Admin
    public function login(){
        return view('Dashboard.Auth.login');
    }

    public function Regist(){
        return view('Dashboard.Auth.regist');
    }

    public function postLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/Dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function postRegist(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:admins'],
            'no_hp' => ['required','max:13'],
            'password' => ['required']

        ]);

        $admin = Admins::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => bcrypt( $request->password),
        ]);

        if($admin){
            return redirect()->route('login')->with('success', 'Selamt kamu berhasil Regist');
        }else{
            return redirect()->back()->with('faild', 'Cek kembali data kamu');
        }

    }

    public function logout(Request $request){

        Auth::guard('admins')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login-admin');
    }

    // end auth admin

    // auth User Customer

    public function LoginUser(){
        return view('User.Auth.Login');
    }
    public function RegistUser(){
        return view('User.Auth.Regist');
    }

    public function postLoginUser(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function postRegistUser(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'no_hp' => ['required','max:13'],
            'alamat' => ['required'],
            'password' => ['required']

        ]);

        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => bcrypt( $request->password),
        ]);
        if($User){
             return redirect()->route('login-user')->with('success', 'Selamt kamu berhasil Regist');

        }else{
             return redirect()->back()->with('faild', 'Cek Kembali data anda');

        }
    }

    public function logoutUser(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // end auth User Customer


}
