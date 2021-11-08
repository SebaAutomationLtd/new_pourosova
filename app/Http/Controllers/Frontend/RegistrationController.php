<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BosotBariHolding;
use App\Models\BusinessHolding;
use App\Models\BusinessStall;
use App\Models\User;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    // Bosost Bari Store
    public function bosot_bari_store(Request $request)
    {
        try {
        $validated = $request->validate([
        'name' => 'required|max:150|min:2',
        'father_name' => 'required|max:150|min:2',
        'nid' => 'required|max:50|min:2',
        'dob' => 'required|date',
        'mobilenumber' => 'required|max:11',
        'ward_id' => 'required',
        'village_id' => 'required',
        'holding_no' => 'required',
        'type_house' => 'required',
        'number_room' => 'required',
    ]);

        $holding_exist = BosotBariHolding::where('ward_id',$request->ward_id)
                                        ->where('village_id',$request->village_id)
                                        ->where('holding_no',$request->holding_no)
                                        ->get();

         if(count($holding_exist)>0){
            $request->flashOnly(['holding_no']);
           return redirect(route('reg.bosot-bari'))->withInput()->with('message','উক্ত ওয়ার্ড ও গ্রামে প্রদত্ত হোল্ডিং ইতিমধ্যে নিবন্ধিত করা আছে । ');
         }else 
         {
                    $user = new User();
        $user->name = $request->name;
        $user->contact = $request->mobilenumber;
        $user->password = bcrypt('123456');
        $user->show_password = '123456';
        $user->username = Str::slug($request->name, '-');
        $user->save();

        $bosotbari = new BosotBariHolding();
        $bosotbari->user_id = $user->id;
        if($request->gurdian_status == "father")
        {
            $bosotbari->father = $request->father_name;

        }else if($request->gurdian_status == "husband")
        {
            $bosotbari->spouse = $request->father_name;

        }

        if($request->birth_nid == "nid")
        {
            $bosotbari->nid = $request->nid;

        }else if($request->birth_nid == "birth_id_no")
        {
            $bosotbari->birth_certificate = $request->nid;

        }
        
        $bosotbari->dob = $request->dob;
        $bosotbari->ward_id = $request->ward_id;
        $bosotbari->village_id  = $request->village_id;
        $bosotbari->holding_no  = $request->holding_no;
        $bosotbari->house_type_id   = $request->type_house;
        $bosotbari->total_room   = $request->number_room;

        $bosotbari->save();

        return redirect(route('reg.bosot-bari'))->with('message','বসতবাড়ি হোল্ডিং সফলভাবে নিবন্ধিত হয়েছে ।');

         }                          
            
        } catch (\Exception $e) {
             $err_message = \Lang::get($e->getMessage());
        return redirect(route('reg.bosot-bari'))->withInput()->with('message','দুঃখিত... বসতবাড়ি হোল্ডিং নিবন্ধিত হয়নি ।'); 
        }

    }

    // Business Holding Store

    public function business_store(Request $request)
    {

         try {
        //     echo "<pre>";
        // print_r($request->all());
        // exit;
        $validated = $request->validate([
        'name' => 'required|max:150|min:2',
        'father_name' => 'required|max:150|min:2',
        'nid' => 'required|max:50|min:2',
        'dob' => 'required|date',
        'mobilenumber' => 'required|max:11',
        'ward_id' => 'required',
        'holding_no' => 'required',
        'total_room' => 'required',
    ]);


        $user = new User();
        $user->name = $request->name;
        $user->contact = $request->mobilenumber;
        $user->password = bcrypt('123456');
        $user->show_password = '123456';
        $user->username = Str::slug($request->name, '-');
        $user->save();

        $businessholding = new BusinessHolding();
        $businessholding->user_id = $user->id;
        if($request->gurdian_status == "father")
        {
            $businessholding->father = $request->father_name;

        }else if($request->gurdian_status == "husband")
        {
            $businessholding->spouse = $request->father_name;

        }

        if($request->birth_nid == "nid")
        {
            $businessholding->nid = $request->nid;

        }else if($request->birth_nid == "birth_id_no")
        {
            $businessholding->birth_certificate = $request->nid;

        }
        
        $businessholding->dob = $request->dob;
        $businessholding->ward_id = $request->ward_id;
        $businessholding->holding_no  = $request->holding_no;
        $businessholding->total_room   = $request->total_room;

        $businessholding->save();


        for ($i=0; $i <= count($request->stall_no)-1 ; $i++) { 
           BusinessStall::create([
              'business_holding_id' => $businessholding->id,
              'stall_no' =>  $request->stall_no[$i],
              'ownership' =>  $request->ownership[$i],
              'stall_nid' =>  $request->stall_nid[$i],
              'stall_date' =>  $request->stall_date[$i],
              'stall_phone' =>  $request->stall_phone[$i],
              'stall_rent' =>  $request->stall_rent[$i],
              'stall_tax' =>  $request->stall_tax[$i],
            ]);
            
        }

        return redirect(route('reg.business-hold'))->with('message','বানিজ্যিক হোল্ডিং সফলভাবে নিবন্ধিত হয়েছে ।');
                       
            
        } catch (\Exception $e) {
             $err_message = \Lang::get($e->getMessage());
        return redirect(route('reg.business-hold'))->withInput()->with('message','দুঃখিত... বানিজ্যিক হোল্ডিং নিবন্ধিত হয়নি ।'); 
        }
    }

}
