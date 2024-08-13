<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenController extends Controller
{
    public function login(){
        return view('login.login');
    }

    public function postLogin(UserLoginRequest $req){
        $remember = $req->has('remember') ? true : false;
        if(Auth::attempt([
            'email' => $req->email,
            'password' => $req->password,
        ],$remember)){
            if(isset($remember)&&!empty($remember)){
                setcookie("email",$req->email,time()+3600);
                setcookie("password",$req->password,time()+3600);
            }else{
                setcookie("email",""); 
                setcookie("password","");
            }
            return redirect()->route('admin.user.home');
        }else{
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('login')->with('error', 'Đăng xuất thành công');
    }

    public function register(){
        return view('login.register');
    }
    public function postRegister(UserRegisterRequest $req){
            $newAuth = new user();
            $newAuth -> name = $req -> name;
            $newAuth -> email = $req -> email;
            $newAuth -> password =  Hash::make($req -> password);
            $newAuth -> save();

        return redirect()->route('login');
    }
}
