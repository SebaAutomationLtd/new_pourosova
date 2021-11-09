<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class VillageController extends Controller
{
     public function village(){
    	$villages = DB::table('villages')->join('wards','villages.ward_id','wards.id')->get();
    	$words = DB::table('wards')->get();
    
        return view('admin.village.village-view',compact('words' ,'villages'));
    }


    public function village_store(Request $request){
        $request->validate([
            'name'=> 'required|max:100',
            'ward_id'=> 'required',
        ]);

        $data =array();
        $data['name']= $request->name;
        $data['ward_id']= $request->ward_id;
        $data['status']= 1;

        $store = DB::table('villages')->insert($data);
        return redirect(route('admin.web.village.village'))->with('message','Village Added');
    }

    public function village_delete($name){
        $delete = DB::table('villages')->where('name',$name)->delete();
        return redirect(route('admin.web.village.village'))->with('message','Village Deleted');
    }


     public function village_edit($name){
        $village = DB::table('villages')->where('name',$name)->first();
        $words = DB::table('wards')->get();
        return view('admin.village.village-edit',compact('village','words'));
    }

     public function village_update(Request $request, $id){
        $request->validate([
            'name'=> 'required|max:100',
            'ward_id'=> 'required',
        ]);

            $data =array();
            $data['name']= $request->name;
        	$data['ward_id']= $request->ward_id;

            $update = DB::table('villages')->where('id',$id)->update($data);
            return redirect(route('admin.web.village.village'))->with('message','Village Updated');

    }


}
