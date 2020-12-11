<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use Validator;
use Auth;

class AccountController extends Controller
{
    function AccountDetailView($id){
        $user=User::find($id);
        if(!empty($user)){
            $reviews=Review::query()->where('person_review',$id);
            return view('client.views.account-detail',["user"=>$user,"reviews"=>$reviews->paginate(10)->appends(request()->input())]);
        }
        else{
            return back();
        }
    }
    function AccountSettingView(){
        return view('client.views.account-setting');
    }
    function AccountUpdate(Request $request){
        $data = $request->validate([
            'name_user' => 'nullable|max:40',
            'gender_user' => 'required',
            'birth_user'=>'required|date',
            'image_user'=>'nullable',
            'email_user'=>'nullable',
            'old_password'=>'required_with:new_password',
            'new_password'=>'required_with:old_password',
            'confirm_password'=>'same:new_password'
        ]);
        $user=User::find(Auth::user()->id_user);
        $user->name_user=$request->name_user;
        $user->gender_user=$request->gender_user;
        $user->birth_user=$request->birth_user;
        $user->image_user=$request->image_user;
        $user->email_user=$request->email_user;
        if($request->old_password){
            if(\password_verify($request->old_password,$user->password_user)){
                $user->password_user=password_hash($request->new_password, PASSWORD_DEFAULT);
            }
            else{
                return \redirect()->back()->with('account_message','Mật khẩu cũ bị sai')->with('class','alert alert-danger');;
            }
        }
        if($user->save()){
            return redirect()->route('account.detail',Auth::user()->id_user)->with('account_message','Cập nhập thành công thành công')->with('class','alert alert-success');
        }
        return redirect()->route('account.detail',Auth::user()->id_user)->with('account_message','Cập nhập thành công thất bại,xin thử lại')->with('class','alert alert-danger');
        
    }
}
