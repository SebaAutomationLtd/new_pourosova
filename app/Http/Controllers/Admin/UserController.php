<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->sortByDesc('created_at')
            ->where('role', '<>', 'Bosot Bari Member')
            ->where('role', '<>', 'Commercial Hold Reg')
            ->where('role', '<>', 'Business Hold Reg')
            ->where('email', '<>', Auth::user()->email);

        return view('admin.user.index', compact('users'));
    }
    //
    public function create_user_form()
    {
        return view('admin.user.create');
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'password' => 'required|min:6',
            'photo' => 'max:2048'
        ]);

        if($request->photo) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('Admin/img/user_photo'), $imageName);
        }

        User::create([
            'user_id' => $request->user_id,
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'contact' => $request->contact,
            'ward' => $request->ward ?? null,
            'photo' => $imageName ?? null
        ]);

        $notification=array(
            'messege'=>'User created successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit_user_form($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            return view('admin.user.edit', compact('user'));
        } else {
            $notification=array(
                'messege'=>'User is not found',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

    public function delete_user($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            if($user->delete()) {
                $notification=array(
                    'messege'=>'User deleted successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }
        }

        $notification=array(
            'messege'=>'User couldn\'t delete',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }
}
