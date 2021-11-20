<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReligionController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:common-data-setup']);
    }

    /*--------------Religion--------------*/
    public function religion()
    {
        $religions = DB::table('religions')->get();
        return view('admin.religion.religion-view', compact('religions'));
    }

    public function religion_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['status'] = 1;

        $store = DB::table('religions')->insert($data);
        return redirect(route('admin.web.religion.religion'))->with('message', 'Religion Added');
    }

    public function religion_delete($id)
    {
        $delete = DB::table('religions')->where('id', $id)->delete();
        return redirect(route('admin.web.religion.religion'))->with('error', 'Religion Deleted');
    }

    public function religion_edit($id)
    {
        $religion = DB::table('religions')->where('id', $id)->first();
        return view('admin.religion.religion-edit', compact('religion'));
    }

    public function religion_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $data = array();
        $data['name'] = $request->name;

        $update = DB::table('religions')->where('id', $id)->update($data);
        return redirect(route('admin.web.religion.religion'))->with('message', 'Religion Updated');

    }


    /*--------------Gender--------------*/
    public function gender()
    {
        $genders = DB::table('genders')->get();
        return view('admin.gender.gender-view', compact('genders'));
    }

    public function gender_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['status'] = 1;

        $store = DB::table('genders')->insert($data);
        return redirect(route('admin.web.religion.gender'))->with('message', 'Gender Added');
    }

    public function gender_delete($id)
    {
        $delete = DB::table('genders')->where('id', $id)->delete();
        return redirect(route('admin.web.religion.gender'))->with('error', 'Gender Deleted');
    }

    public function gender_edit($id)
    {
        $gender = DB::table('genders')->where('id', $id)->first();
        return view('admin.gender.gender-edit', compact('gender'));
    }

    public function gender_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $data = array();
        $data['name'] = $request->name;

        $update = DB::table('genders')->where('id', $id)->update($data);
        return redirect(route('admin.web.religion.gender'))->with('message', 'Gender Updated');
    }

    public function merital_status()
    {
        $meritals = DB::table('marital_statuses')->where('status', 1)->get();
        return view('admin.merital_status.merital_status-view', compact('meritals'));
    }

    public function merital_status_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['status'] = 1;
        $store = DB::table('marital_statuses')->insert($data);
        return redirect()->back()->with('message', 'House Type Added');
    }

    public function merital_status_edit($id)
    {
        $update = DB::table('marital_statuses')->where('id', $id)->first();
        return view('admin.merital_status.merital_status-edit', compact('update'));
    }

    public function merital_status_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $data = array();
        $data['name'] = $request->name;

        $update = DB::table('marital_statuses')->where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Merital Status Updated');
    }

    public function merital_status_delete($id)
    {
        $delete = DB::table('marital_statuses')->where('id', $id)->delete();
        return redirect()->back()->with('error', 'Merital Status Deleted');
    }
}
