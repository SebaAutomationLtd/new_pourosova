<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marquee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderController extends Controller
{
    public function index(){
        return view('admin.structure.logo');
    }

    public function logo(){
        return view('admin.structure.logo');
    }
    public function marquee(){
        $marquees = Marquee::all()->sortByDesc('created_at');
        return view('admin.structure.marquee', compact('marquees'));
    }


    public function marquee_store(Request $request) {
        Marquee::create([
            'title' => $request->title,
            'link' => $request->link,
            'created_by' => 1
        ]);
        return redirect(route('admin.header.marquee'));
    }


    public function marquee_delete($id) {
        $marquee_delete = Marquee::find($id)->delete();
        return redirect(route('admin.header.marquee'));
    }



    public function councilor(){
        return view('admin.structure.councilor');
    }

    public function logo_store(Request $request) {

        if($request->file()) {
            foreach ($request->file() as $name => $image) {
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('img'), $imageName);
                DB::table('website_settings')->insert([
                    'name' => $name,
                    'value' => $imageName,
                    'created_by' => 1
                ]);
            }
            return redirect()->back();
        }
    }




}
