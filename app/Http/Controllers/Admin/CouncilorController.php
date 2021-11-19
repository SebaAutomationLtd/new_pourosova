<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Councilor;
use App\Models\Ward;
use DB;



class CouncilorController extends Controller
{
    //For Male
    public function index(){
        $male_councilors = Councilor::where('councilor_type','male')->get()->sortByDesc('created_at');
        return view('admin.councilor.councilor-view',compact('male_councilors'));
    }

    public function create(){
        $wards = Ward::get();
        return view('admin.councilor.councilor-add',compact('wards'));
    }

    public function councilor_store(Request $request){
        $request->validate([
            'name'        => 'required',
            'place'       => 'required',
            'ward_no'     => 'required',
            'contact'     => 'required',
            'photo'       => 'mimes:jpeg,jpg,png|required|max:10000',
            'description' => 'required'
        ]);

        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/councilor'), $imageName);

            Councilor::create([
                'name'          => $request->name,
                'place'         => $request->place,
                'ward_no'       => $request->ward_no,
                'contact'       => $request->contact,
                'photo'         => $imageName,
                'description'   => $request->description,
                'councilor_type'=> 'male',
                'created_by'    => auth()->id()
            ]);
            return redirect(route('admin.web.councilor'))->with(['message'=>'নতুন কাউন্সিলর অ্যাড করা হয়েছে']);
        }
    }

    public function councilor_delete($id){
        $old = DB::table('councilors')->where('id',$id)->first();
            if (file_exists(public_path('uploads/councilor/'.$old->photo))) {
                unlink(public_path('uploads/councilor/'.$old->photo));
            }

        $delete = DB::table('councilors')->where('id',$id)->delete();
        return redirect(route('admin.web.councilor'));
    }


    public function councilor_edit($id){
        $councilor = Councilor::where('councilor_type','male')->where('id',$id)->first();
        return view('admin.councilor.councilor-edit',compact('councilor'));
    }
    public function councilor_update(Request $request,$id){
            $update_concilor = Councilor::find($id);

        if(!$request->hasFile('photo')) {
                $update_concilor->update([
                    'name'          => $request->name,
                    'place'         => $request->place,
                    'ward_no'       => $request->ward_no,
                    'contact'       => $request->contact,
                    'description'   => $request->description,
                ]);
            }else{
                $image = $request->file('photo');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/councilor'), $imageName);
                   $update_concilor->update([
                    'name'          => $request->name,
                    'place'         => $request->place,
                    'ward_no'       => $request->ward_no,
                    'contact'       => $request->contact,
                    'description'   => $request->description,
                    'photo'         => $imageName
                ]);
            }
           /* return redirect()->back()->with(['success'=>'কাউন্সিলর আপডেট করা হয়েছে']);*/
           return redirect(route('admin.web.councilor'));
    }

    //For Female
    //For Male
    public function indexFemale(){
        $female_councilors = Councilor::where('councilor_type','female')->get()->sortByDesc('created_at');
        return view('admin.councilor-Female.councilor-view',compact('female_councilors'));
    }
    public function female_store(Request $request){
        $request->validate([
            'name'        => 'required',
            'place'       => 'required',
            'ward_no'     => 'required',
            'contact'     => 'required',
            'photo'       => 'mimes:jpeg,jpg,png|required|max:10000',
            'description' => 'required'
        ]);
        // $validator = Validator::make($request->all(), $rules);
        //     if ($validator->fails()) {
        //         return redirect()->back()->withErrors($validator)->withInput();
        //     }

        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/councilor'), $imageName);

            Councilor::create([
                'name'          => $request->name,
                'place'         => $request->place,
                'ward_no'       => $request->ward_no,
                'contact'       => $request->contact,
                'photo'         => $imageName,
                'description'   => $request->description,
                'councilor_type'=> 'female',
                'created_by'    => auth()->id()
            ]);

            return redirect(route('admin.web.councilor.female'))->with(['message'=>' নতুন (সংরক্ষিত) কাউন্সিলর অ্যাড করা হয়েছে']);
        }
    }

    public function councilor_female_delete($id){
        $old = DB::table('councilors')->where('id',$id)->first();
            if (file_exists(public_path('uploads/councilor'.$old->photo))) {
                unlink(public_path('uploads/councilor'.$old->photo));
            }

        $delete = DB::table('councilors')->where('id',$id)->delete();
        return redirect(route('admin.web.councilor.female'));
    }



    public function female_edit($id){

        $female_councilor = Councilor::where('councilor_type','female')->where('id',$id)->first();
        return view('admin.councilor-female.councilor-edit',compact('female_councilor'));
    }
    public function female_update(Request $request,$id){

        $update_female = Councilor::find($id);
            if(!$request->hasFile('photo')) {
                $update_female->update([
                    'name'          => $request->name,
                    'place'         => $request->place,
                    'ward_no'       => $request->ward_no,
                    'contact'       => $request->contact,
                    'description'   => $request->description,
                ]);
            }else{
                $image = $request->file('photo');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/councilor'), $imageName);
                $update_female->update([
                    'name'          => $request->name,
                    'place'         => $request->place,
                    'ward_no'       => $request->ward_no,
                    'contact'       => $request->contact,
                    'photo'         => $imageName,
                    'description'   => $request->description,
                ]);
            }
        /*return redirect()->back()->with(['success'=>' কাউন্সিলর(সংরক্ষিত) আপডেট করা হয়েছে']);*/
        return redirect(route('admin.web.councilor.female'));
    }

    public function createFemale(){
        $wards = Ward::get();
        return view('admin.councilor-Female.councilor-add',compact('wards'));
    }
    //For Female End
}
