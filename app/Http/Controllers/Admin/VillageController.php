<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class VillageController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:common-data-setup']);
    }

    public function ward()
    {
        $wards = DB::table('wards')->where('status', 1)->get();
        return view('admin.ward.ward-view', compact('wards'));
    }

    public function ward_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $data = array();
        $data['ward_no'] = $request->name;
        $data['status'] = 1;
        $store = DB::table('wards')->insert($data);
        return redirect()->back()->with('message', 'Ward Added');
    }

    public function ward_edit($id)
    {
        $ward = DB::table('wards')->where('id', $id)->first();
        return view('admin.web.ward-edit', compact('ward'));
    }

    public function village()
    {
        $villages = DB::table('villages')->join('wards', 'villages.ward_id', 'wards.id')->get();
        $words = DB::table('wards')->get();

        return view('admin.village.village-view', compact('words', 'villages'));
    }


    public function village_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'ward_id' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['ward_id'] = $request->ward_id;
        $data['status'] = 1;

        $store = DB::table('villages')->insert($data);
        return redirect(route('admin.web.village.village'))->with('message', 'Village Added');
    }

    public function village_delete($name)
    {
        $delete = DB::table('villages')->where('name', $name)->delete();
        return redirect(route('admin.web.village.village'))->with('error', 'Village Deleted');
    }


    public function village_edit($name)
    {
        $village = DB::table('villages')->where('name', $name)->first();
        $words = DB::table('wards')->get();
        return view('admin.village.village-edit', compact('village', 'words'));
    }

    public function village_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'ward_id' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['ward_id'] = $request->ward_id;

        $update = DB::table('villages')->where('id', $id)->update($data);
        return redirect(route('admin.web.village.village'))->with('message', 'Village Updated');

    }

    public function house_type()
    {
        $house_types = DB::table('house_types')->where('status', 1)->get();
        return view('admin.house_type.house_type-view', compact('house_types'));
    }

    public function house_type_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['status'] = 1;
        $store = DB::table('house_types')->insert($data);
        return redirect()->back()->with('message', 'House Type Added');
    }

    public function house_type_edit($id)
    {
        $update = DB::table('house_types')->where('id', $id)->first();
        return view('admin.house_type.house_type-edit', compact('update'));
    }

    public function house_type_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['status'] = 1;
        $store = DB::table('house_types')->where('id', $id)->update($data);
        return redirect()->back()->with('message', 'House Type Updated');
    }

    public function house_type_delete($id)
    {
        $delete = DB::table('house_types')->where('id', $id)->delete();
        return redirect()->back()->with('error', 'House Type Deleted');
    }

    /*----------------Post Office------------*/

    public function post_office()
    {
        $post_offices = DB::table('post_offices')->get();
        return view('admin.post_office.post_office-view', compact('post_offices'));
    }


    public function post_office_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'code' => 'required|max:100',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['code'] = $request->code;
        $data['status'] = 1;

        $store = DB::table('post_offices')->insert($data);
        return redirect(route('admin.web.village.post_office'))->with('message', 'Post Office Added');
    }

    public function post_office_delete($id)
    {
        $delete = DB::table('post_offices')->where('id', $id)->delete();
        return redirect(route('admin.web.village.post_office'))->with('error', 'Post Office Deleted');
    }


    public function post_office_edit($id)
    {
        $post_office = DB::table('post_offices')->first();
        return view('admin.post_office.post_office-edit', compact('post_office'));
    }

    public function post_office_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'code' => 'required|max:100',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['code'] = $request->code;

        $update = DB::table('post_offices')->where('id', $id)->update($data);
        return redirect(route('admin.web.village.post_office'))->with('message', 'Post Office Updated');

    }


}
