<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
