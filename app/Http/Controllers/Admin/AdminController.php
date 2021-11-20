<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function __construct()
    {

    }

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
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:99',
            'password' => 'required|min:8|max:99'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            $notification = array(
                'message' => 'Email Or Password Invalid',
                'alert-type' => 'error'
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
            'password' => 'required|min:2|max:100|confirmed',
            'password_confirmation' => 'required|min:2|max:100',
        ]);

        $current_user = Auth()->user();

        if (Hash::check($request->old_password, $current_user->password)) {

            User::find($current_user->id)->update([
                'password' => Hash::make($request->password)
            ]);

            Auth::logout();
            return redirect(route('admin.login'))->with('message', 'Password Successfully Changes');

        } else {
            return redirect(route('admin.setting.change_password'))->with('error', 'Old Password do not match');
        }
    }


    public function change_email()
    {
        $id = Auth::user()->id;
        $admin = DB::table('users')->where('id', $id)->first();

        return view('admin.admin_settings.change_email', compact('admin'));
    }

    public function update_email(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_email' => 'required|max:99|email',
            'new_email' => 'required|max:99|email',
            'password' => 'required|min:8|max:99'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $user = Auth::user();

            if ($user->email == $request->old_email &&
                Hash::check($request->passowrd, $user->password)) {

                User::where('id', $user->id)->update([
                    'email' => $request->new_email
                ]);

            } else {
                return redirect()->back()->with('error', 'Wrong credentials')->withInput();
            }

            return redirect(route('admin.dashboard'))->with('message', 'Email Successfully Updated');
        }

    }

}
