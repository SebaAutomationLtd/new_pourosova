<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    function __construct()
    {

    }


    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::get();
        return view('admin.roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'bangla_name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name'), 'bangla_name' => $request->bangla_name]);
        $role->syncPermissions($request->input('permission'));

        $notification = array(
            'messege' => 'Role created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('roles.index')
            ->with($notification);
    }


    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Role deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('roles.index')
            ->with($notification);
    }
}
