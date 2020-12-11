<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Authority;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    function Login(Request $request){
        $data = $request->validate([
            'account_user' => 'required|max:40',
            'password' => 'required|alphaNum|min:3|max:20',
        ]);

        if(Auth::attempt($data)){
            return redirect()->back();
        }
        else{
            return redirect()->back()->with('login_message','Thông tin tài khoản sai hoặc tài khoản không tồn tại')->with('class','alert alert-danger');
        }
    }
    function Register(Request $request){
        $data = $request->validate([
            'account_user' => 'required|max:40',
            'password' => 'required|alphaNum|min:3|max:20',
            'email_user'=>'nullable',
        ]);
        if(User::query()->where('account_user',$data['account_user'])->first()||User::query()->where('email_user',$data['email_user'])->first()){
            return redirect()->back()->with('register_message','Đăng ký thất bại,tên tài khoản hoặc email đã tồn tại')->with('class','alert alert-danger');;
        }
        $user=new User($data);
        $user->account_user=$data['account_user'];
        $user->password_user=password_hash($data['password'], PASSWORD_DEFAULT);
        $user->email_user=$data['email_user'];
        $user->auth_user=Authority::query()->where('name_auth','user')->first()->id_auth;
        $user->remember_token=Str::random(10);
        if($user->save()){
            return redirect()->back()->with('login_message','Đăng ký thành công')->with('class','alert alert-success');
        }
        else{
            return redirect()->back()->with('register_message','Lỗi xảy ra,xin hãy thử lại')->with('class','alert alert-danger');;
        }
    }
    public function username()
    {
        return 'account_user';
    }
    public function Logout(){
        Auth::Logout();
        return redirect()->back();
    }
}
