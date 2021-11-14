<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use DB;

class AdminController extends Controller
{
    public function admin_login_form()
    {
        return view('admin.admin_login');
    }

    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function admin_login(Request $request)
    {
        $data = $request->all();
        if(Auth::attempt(['username'=> $data['username'], 'password'=>$data['password']])){
            return redirect()->route('admin.dashboard');
        }else{
            $notification=array(
                'message'=>'Email Or Password Invalid',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function admin_logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function username()
    {
        return 'username';
    }


    /*----------------ADMIN PASSWORD AND EMAIL CHANGE----------*/


    public function change_password()
    {
        return view('admin.admin_settings.change_password');
    }

    public function update_password(Request $request)
    {
         $request->validate([
            'old_password' => 'required|min:2|max:100',
            'new_password' => 'required|min:2|max:100',
            'confirm_password' => 'required|min:2|max:100',
        ]);

        $current_user = Auth()->user();

        if (Hash::check($request->old_password,$current_user->password)) {

            if ($request->new_password == $request->confirm_password) {

                User::find($current_user->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);

                Auth::logout();
                return redirect(route('admin.login'))->with('message','Password Successfully Changes');

            }else{
                return redirect(route('admin.setting.change_password'))->with('error','Password and Confirm Password do not match');
            }

        }else{
            return redirect(route('admin.setting.change_password'))->with('error','Old Password do not match');
        }
    }



    public function change_email()
    { 
        $id = Auth::user()->id;
        $admin = DB::table('users')->where('id',$id)->first();

        return view('admin.admin_settings.change_email',compact('admin'));
    }

    public function update_email(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $id = Auth::user()->id;

        $data =array();
        $data['email']= $request->email;

        $update = DB::table('users')->where('id',$id)->update($data);
        return redirect(route('admin.dashboard'))->with('message','Email Successfully Updated');
    }

}
