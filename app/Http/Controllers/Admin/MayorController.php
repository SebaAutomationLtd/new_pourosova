<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mayor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MayorController extends Controller
{
    public function index(){
    	$mayors = DB::table('mayors')->get();
        return view('admin.mayor.mayor-panel-view',compact('mayors'));
    }

    public function create(){
        return view('admin.mayor.mayor-panel-add');
    }

    public function store(Request $request) {

    	$request->validate([
            'name'=> 'required|max:255',
            'place'=> 'required',
            'serial'=> 'required',
            'mobile'=> 'required|max:11',
            'image'=> 'required',
        ]);

    	if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            Mayor::create([
                'name' => $request->name,
                'place' => $request->place,
                'mobile' => $request->mobile,
                'serial' => $request->serial,
                'image' => $imageName,
                'created_by' => 1
            ]);
            return redirect(route('admin.web.mayor'))->with('message','Mayor Added');
        }

    }


    public function delete($id){
         $old = DB::table('mayors')->where('id',$id)->first();
            if (file_exists(public_path('img/'.$old->image))) {
                unlink(public_path('img/'.$old->image));
            }

    	$delete = Mayor::find($id)->delete();
    	return redirect(route('admin.web.mayor'))->with('message','Mayor Deleted');
    }

    public function edit($id){
    	$mayor = Mayor::find($id)->first();
    	return view('admin.mayor.mayor-panel-edit',compact('mayor'));
    }


    public function update(Request $request, $id){
    	$request->validate([
            'name'=> 'required',
            'place'=> 'required',
            'serial'=> 'required',
            'mobile'=> 'required',
        ]);

        $data =array();
        $data['name']= $request->name;
        $data['place']= $request->place;
        $data['mobile']= $request->mobile;
        $data['serial']= $request->serial;

    	if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
           	
	        $data['image']=$imageName;

            $old = DB::table('mayors')->where('id',$id)->first();
            if (file_exists(public_path('img/'.$old->image))) {
                unlink(public_path('img/'.$old->image));
            }

        }

        $update = DB::table('mayors')->where('id',$id)->update($data)->with('message','Mayor Updated');
        return redirect(route('admin.web.mayor'));
    }



}
