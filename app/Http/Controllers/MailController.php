<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
class MailController extends Controller
{

    public function forgotPass(){
        return view('login.forgetPass');
    }
    public function postForgotPass(Request $req)
    {
        $req->validate([
            'email' =>  'required|email|exists:users',
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ email hợp lệ',
            'email.exists' => 'Email này không tồn tại'
        ]);
        $token = strtoupper(Str::random(10));
        $user = User::where('email', $req->email)->first();
        $user->update(['token'=>$token]);

        Mail::send('emails.password_reset', compact('user'), function ($email) use ($user) {
            $email->to($user->email, $user->name)
                    ->subject('Reset Password');
        });

        return redirect()->back()->with('message', 'Vui lòng kiểm tra email để reset mật khẩu.');
    }
    public function getPass(User $user, $token){
        if($user->token === $token){
            return view('login.getPass');
        }
        return abort(404);
    }

    public function postGetPass(User $user, $token,Request $req){
        $req->validate([
            'password' =>  'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'confirm_password' => 'required|same:password',
        ],[
            'password.required' => 'Vui lòng nhập mật khẩu mới',
            'password.min' => 'Mật khẩu phải từ 8 ký tự',
            'password.regex' => 'Mật khẩu phải bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu nhập lại không trùng khớp'
        ]);
        $password_h = Hash::make($req -> password);
        $user->update(['password'=>$password_h, 'token'=>null]);
        return redirect()->route('login')->with('message', 'Cập nhật mật khẩu thành công');
    }
}
