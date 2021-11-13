<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RightSideApplication;
use App\Models\RightSideBanner;
use App\Models\RightTopBanner;
use DB;

class RightSidebarController extends Controller
{

    public function topView(){
        $top_banner = RightTopBanner::first();
        return view('admin.sidebar.right-top',compact('top_banner'));
    }
    public function top_store(Request $request){
        $request->validate([
            'photo'      => 'mimes:jpeg,jpg,png|required|max:10000'
        ]);
        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/rightside'), $imageName);

            RightTopBanner::create([
                'photo'             => $imageName,
                'created_by'        => 1
            ]);
            return redirect()->back();
        }
    }


    public function top_edit($id){
        $top_banner = DB::table('right_top_banners')->where('id',$id)->first();
        return view('admin.sidebar.right_top_edit',compact('top_banner'));
    }


    public function top_update(Request $request, $id){

        $request->validate([
            'image'      => 'mimes:jpeg,jpg,png|required|max:10000'
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/rightside'), $imageName);

            $data =array();
            $data['photo']=$imageName;

            $old = DB::table('right_top_banners')->where('id',$id)->first();
            if (file_exists(public_path('uploads/rightside/'.$old->photo))) {
                unlink(public_path('uploads/rightside/'.$old->photo));
            }

            $update = DB::table('right_top_banners')->where('id',$id)->update($data);
            return redirect(route('admin.web.right.top'));

        }

        

    }




    public function linkView(){
        $right_links = RightSideApplication::all()->sortByDesc('created_at');
        return view('admin.sidebar.right-links',compact('right_links'));
    }
    public function link_store(Request $request){
        $request->validate([
            'title'      => 'required',
            'link'       => 'required',
        ]);
 		RightSideApplication::create([
            'title' 		=> $request->title,
            'link'  		=> $request->link,
            'created_by' 	=> 1
        ]);
       return redirect()->back();
    }	


    public function link_delete($id){

        $delete = DB::table('right_side_applications')->where('id',$id)->delete();
        return redirect(route('admin.web.right.links'));
    }


    public function link_edit($id){
        $right_link = RightSideApplication::find($id);
        return view('admin.sidebar.right-links-edit',compact('right_link'));
    }
    public function link_update(Request $request,$id){
        $update_link = RightSideApplication::find($id);
            $update_link->update([
                'title'      => $request->title,
                'link'       => $request->link
            ]);
            return redirect(route('admin.web.right.links'));
    }



    public function bannerView(){
        $right_banners = RightSideBanner::all()->sortByDesc('created_at');
        return view('admin.sidebar.right-banner',compact('right_banners'));
    }
    public function banner_store(Request $request){
        $request->validate([
            'title'             => 'required',
            'information_type'  => 'required',
            'description'       => 'required',
            'photo'             => 'mimes:jpeg,jpg,png|required|max:10000'
        ]);
    	if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/rightside'), $imageName);
        
            RightSideBanner::create([
                'title'           	=> $request->title,
                'information_type'  => $request->information_type,
                'description'       => $request->description,
                'photo'				=> $imageName,
                'created_by' 		=> 1
            ]);
            return redirect()->back();
        }

    }

    public function banner_delete($id){

        $old = DB::table('right_side_banners')->where('id',$id)->first();
            if (file_exists(public_path('uploads/rightside/'.$old->photo))) {
                unlink(public_path('uploads/rightside/'.$old->photo));
            }

        $delete = DB::table('right_side_banners')->where('id',$id)->delete();
        return redirect(route('admin.web.right.banner'));
    }


    public function banner_edit($id){
        $right_banner = RightSideBanner::find($id);
        return view('admin.sidebar.right-banner-edit',compact('right_banner'));
    }
    public function banner_update(Request $request,$id){

        $update_banner = RightSideBanner::find($id);

            if(!$request->hasFile('photo')) {            
                $update_banner->update([
                    'title'             => $request->title,
                    'information_type'  => $request->information_type,
                    'description'       => $request->description,
                ]);
            }else{
                $image = $request->file('photo');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/rightside'), $imageName);

                $update_banner->update([
                    'title'             => $request->title,
                    'information_type'  => $request->information_type,
                    'description'       => $request->description,
                    'photo'             => $imageName
                ]);
            }
            return redirect(route('admin.web.right.banner'));
        }
}
