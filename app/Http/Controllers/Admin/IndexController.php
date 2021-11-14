<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{   
    public function slider(){
        $sliders = DB::table('sliders')->get();
        return view('admin.index.slider',compact('sliders'));
    }

    public function slider_store(Request $request){

        $request->validate([
            'serial'=> 'required',
            'image'=> 'mimes:jpeg,jpg,png|required|max:10000',
        ]);

        $serial_check =DB::table('sliders')->where('serial',$request->serial)->first();

        if (!$serial_check) {

            if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/slider'), $imageName);
            Slider::create([
                'title' => $request->title,
                'serial' => $request->serial,
                'image' => $imageName,
                'created_by' => 1
            ]);
            return redirect(route('admin.index.slider'))->with('message','Slider Added');
        }
        }else{
            $data =array();
            $data['title']= $request->title;
            $data['serial']= $request->serial;

            if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/slider'), $imageName);
            
            $data['image']=$imageName;

            $old = DB::table('sliders')->where('serial',$request->serial)->first();
            if (file_exists(public_path('uploads/slider/'.$old->image))) {
                unlink(public_path('uploads/slider/'.$old->image));
            }

        }

        $update = DB::table('sliders')->where('serial',$request->serial)->update($data);
        return redirect(route('admin.index.slider'))->with('message','Slider Updated');
        }

    }



    public function delete($id){

        $old = DB::table('sliders')->where('id',$id)->first();
            if (file_exists(public_path('uploads/slider/'.$old->image))) {
                unlink(public_path('uploads/slider/'.$old->image));
            }

        $delete = Slider::find($id)->delete();
        return redirect(route('admin.index.slider'))->with('error','Slider Deleted');
    }



    public function about(){
        return view('admin.index.about');
    }



}
