<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:user-management']);
    }

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
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required',
            'name' => 'required|string|max:255',
            'password' => 'required|min:8|max:80',
            'photo' => 'sometimes|mimes:jpeg,jpg,png|required|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->photo) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/user_photo'), $imageName);
        }

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'contact' => $request->contact,
            'ward' => $request->ward ?? null,
            'photo' => $imageName ?? null
        ]);

        $role = Role::findById($request->role);
        $user->assignRole($role);

        $notification = array(
            'message' => 'User created successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit_user_form($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        if ($user) {
            return view('admin.user.edit', compact('user', 'roles'));
        } else {
            $notification = array(
                'message' => 'User is not found',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

    public function delete_user($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            if ($user->photo) {
                if (file_exists(public_path('uploads/user_photo/' . $user->photo))) {
                    unlink(public_path('uploads/user_photo/' . $user->photo));
                }
            }
            if ($user->delete()) {
                $notification = array(
                    'message' => 'User deleted successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }
        }

        $notification = array(
            'message' => 'User couldn\'t delete',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function update_user(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required',
            'name' => 'required|string|max:255',
            'password' => 'required|min:8|max:80',
            'photo' => 'sometimes|mimes:jpeg,jpg,png|required|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->photo) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/user_photo'), $imageName);
        }

        $user = User::findOrFail($id);

        if ($user->photo) {
            if (file_exists(public_path('uploads/user_photo/' . $user->photo))) {
                unlink(public_path('uploads/user_photo/' . $user->photo));
            }
        }

        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'contact' => $request->contact,
            'ward' => $request->ward ?? null,
            'photo' => $imageName ?? null
        ]);

        $role = Role::findById($request->role);
        $user->roles()->detach();
        $user->assignRole($role);

        $notification = array(
            'message' => 'User updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
