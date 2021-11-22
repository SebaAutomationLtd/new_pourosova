<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marquee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HeaderController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:website-settings']);
    }

    public function index()
    {
        return view('admin.structure.logo');
    }

    public function logo()
    {
        return view('admin.structure.logo');
    }

    public function marquee()
    {
        $marquees = Marquee::all()->sortByDesc('created_at');
        return view('admin.structure.marquee', compact('marquees'));
    }


    public function marquee_store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'link' => 'sometimes|url|max:255'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Marquee::create([
            'title' => $request->title,
            'link' => $request->link,
            'created_by' => auth()->id()
        ]);
        return redirect(route('admin.header.marquee'))->with('message', 'Marquee Added');
    }


    public function marquee_delete($id)
    {
        $marquee_delete = Marquee::find($id)->delete();
        return redirect(route('admin.header.marquee'))->with('error', 'Marquee Delete');
    }


    public function councilor()
    {
        return view('admin.structure.councilor');
    }

    public function logo_store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'logo_background' => 'sometimes|mimes:svg|max:10000',
            'logo_en' => 'sometimes|mimes:png|max:5000',
            'logo_bn' => 'sometimes|mimes:png|max:5000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = null;
        $name = "";

        if ($request->hasFile('logo_background')) {
            $image = $request->file('logo_background');
            $name = 'logo-background.svg';
        } elseif ($request->hasFile('logo_bn')) {
            $image = $request->file('logo_bn');
            $name = 'logo-bn.png';
        } elseif ($request->hasFile('logo_en')) {
            $image = $request->file('logo_en');
            $name = 'logo-en.png';
        }

        if ($image && $name) {
            if (file_exists(public_path('img/'.$name))) {
                unlink(public_path('img/'.$name));
            }
            $image->move(public_path('img/'), $name);
            $notification = array(
                'message' => 'Uploaded successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

    }


}
