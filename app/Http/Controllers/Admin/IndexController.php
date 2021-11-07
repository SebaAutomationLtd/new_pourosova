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
            'title'=> 'required',
            'serial'=> 'required',
            'image'=> 'required',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            Slider::create([
                'title' => $request->title,
                'serial' => $request->serial,
                'image' => $imageName,
                'created_by' => 1
            ]);
            return redirect(route('admin.index.slider'));
        }

    }


    public function delete($id){

        $old = DB::table('sliders')->where('id',$id)->first();
            if (file_exists(public_path('img/'.$old->image))) {
                unlink(public_path('img/'.$old->image));
            }

        $delete = Slider::find($id)->delete();
        return redirect(route('admin.index.slider'));
    }


    public function about(){
        return view('admin.index.about');
    }



}
