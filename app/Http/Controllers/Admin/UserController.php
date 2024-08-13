<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function home(){
        return view('admin.layouts.home');
    }
    public function listUsers(){
        $listUsers = User::select('id','name','email','role')->get();
        return view('admin.users.listUsers')->with(['listUsers' => $listUsers]);
    }

    public function addUsers(UserAddRequest $req){
            $newUser = new User();
            $newUser -> name = $req -> name;
            $newUser -> email = $req -> email;
            $newUser -> password =  Hash::make($req -> password);
            $newUser -> role = $req -> role;
            $newUser -> save();
        return redirect()->back()->with(['message' =>'Thêm mới thành công']);
    }
    public function deleteUsers(Request $req){
        $req -> validate([
            'id' => 'required',
        ]);
        User::where('id', $req->id)->delete();
        return redirect()->back()->with(['message' =>'Xóa thành công']);
    }

    public function detailUsers(Request $req){
       $user = User::where('id', $req->id)
       ->select('id','name','email','role')
       ->first();
       return json_encode($user);
    }
    public function updateUsers(UserEditRequest $req){
        $user = User::where('id',$req-> idUser);
        if($user -> exists()){
            $check = User::where('email', $req->email)->exists();
            if(!$check){
            $data = [
                'name' => $req -> name,
                'email' => $req -> email,
                'role' => $req -> role
            ];
            $user->update($data);
            }else{
                return redirect()->back()->with(['message' =>'Email đã tồn tại']);
            }
        }
        return redirect()->back()->with(['message' =>'Chỉnh sửa thành công']);
    }
    
}
