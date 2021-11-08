<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mayor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index(){
    	$services = DB::table('services')->get();
        return view('admin.service.service-panel-view',compact('services'));
    }

    public function create(){
        return view('admin.service.service-panel-add');
    }

    public function store(Request $request){
    	$request->validate([
            'title'=> 'required|max:255',
            'link'=> 'required|max:255',
            'image'=> 'mimes:jpeg,jpg,png|required|max:10000',
        ]);

    	if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
           	
           	$data =array();
	        $data['title']= $request->title;
            $data['link']= $request->link;
	        $data['image']=$imageName;
	        $data['created_by']=1;

	        $store = DB::table('services')->insert($data);
            return redirect(route('admin.web.right.service'))->with('message','Service Added');
        }
    }


    public function delete($id){

        $old = DB::table('services')->where('id',$id)->first();
            if (file_exists(public_path('img/'.$old->image))) {
                unlink(public_path('img/'.$old->image));
            }

    	$delete = DB::table('services')->where('id',$id)->delete();
    	return redirect(route('admin.web.right.service'))->with('message','Service Deleted');
    }

    public function edit($id){
    	$service = DB::table('services')->where('id',$id)->first();
    	return view('admin.service.service-panel-edit',compact('service'));
    }


    public function update(Request $request, $id){
    	$request->validate([
            'title'=> 'required',
            'link'=> 'required',
        ]);

        $data =array();
        $data['title']= $request->title;
        $data['link']= $request->link;
        
    	if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);

            $data['image']=$imageName;

            $old = DB::table('services')->where('id',$id)->first();
            if (file_exists(public_path('img/'.$old->image))) {
                unlink(public_path('img/'.$old->image));
            }

        }

        $update = DB::table('services')->where('id',$id)->update($data);
        return redirect(route('admin.web.right.service'))->with('message','Service Updated');
    }

    
}
