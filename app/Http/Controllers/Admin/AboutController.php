<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
     public function index(){
    	$about_puaro = DB::table('about_paurosovas')->first();
        return view('admin.about_paurosova.about_paurosova',compact('about_puaro'));
    }

    public function update(Request $request, $id){
    	$request->validate([
            'title'=> 'required|max:255',
            'description'=> 'required',
        ]);

           	$data =array();
	        $data['title']= $request->title;
	        $data['description']= $request->description;

	        $update = DB::table('about_paurosovas')->where('id',$id)->update($data);
            return redirect(route('admin.web.right.about_paurosova'))->with('message','About Updated');
        
    }
}
