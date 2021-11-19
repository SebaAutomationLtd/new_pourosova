<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\BusinessStall;
use Validator;
use URL;
class ActiveController extends Controller
{

    public function search()
    {
        return view('admin.active_members.search');
    }

    public function searchDb(Request $request)
    {

        $data = [];
        if ($request->type == 1) {
            $data['users'] = DB::table('bosot_bari')
            ->where('ward_id', $request->ward_id)
            ->where('mobile', $request->contact)
            ->orWhere('nid', $request->contact)
            ->orWhere('birth_certificate', $request->contact)->get();
            $data['type'] = 1;

        } else if ($request->type == 2) {

            $data['users'] = DB::table('business_holdings')
            ->where('ward_id', $request->ward_id)
            ->where('mobile', $request->contact)
            ->orWhere('nid', $request->contact)
            ->orWhere('birth_certificate', $request->contact)->get();

            $data['type'] = 2;

        }else if ($request->type == 3) {

            $data['users'] = DB::table('business')
            ->where('ward_id', $request->ward_id)
            ->where('mobile', $request->contact)
            ->orWhere('nid', $request->contact)
            ->orWhere('birth_certificate', $request->contact)->get();

            $data['type'] = 3;

        }


        return view('admin.active_members.result', $data);
    }

    public function deactive($id, $type)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        if ($type == 1) {
            DB::table('bosot_bari')
            ->where('id', $id)
            ->update([
                'status' => 0,
                'deactivated_by' => Auth::user()->id??'0',
                'deactivated_at' => $current_date_time
            ]);
        } else if($type == 2) {
            DB::table('business_holdings')
            ->where('id', $id)
            ->update([
                'status' => 0,
                'deactivated_by' => Auth::user()->id??'0',
                'deactivated_at' => $current_date_time
            ]);
        }else if($type == 3) {
            DB::table('business')
            ->where('id', $id)
            ->update([
                'status' => 0,
                'deactivated_by' => Auth::user()->id??'0',
                'deactivated_at' => $current_date_time
            ]);
        }
        $notification = array(
            'message' => "Deactivated Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function show($id, $type)
    {

        if ($type == 1) {
            $data['user'] = DB::table('bosot_bari')->where('id', $id)->first();
        } else if($type == 2) {
            $data['user'] = DB::table('business_holdings')->where('id', $id)->first();
        }else if($type == 3) {
            $data['user'] = DB::table('business')->where('id', $id)->first();
        }


        $data['type'] = $type;
        return view('admin.active_members.show', $data);
    }

    public function activeshow($id, $type)
    {

        if ($type == 1) {
            $data['user'] = DB::table('bosot_bari')->where('id', $id)
            ->first();
        } else if ($type == 2) {
            $data['user'] = DB::table('business_holdings')->where('id', $id)
            ->first();
        }else if ($type == 3) {
            $data['user'] = DB::table('business')->where('id', $id)
            ->first();
        }


        $data['type'] = $type;

        return view('admin.active_members.active', $data);

    }

    public function active(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();

        if ($request->type == 1) {
            DB::table('bosot_bari')
            ->where('id', $request->id)
            ->update([
                'user_id' => $request->user_id,
                'status' => $request->status,
                'payment_method_id' => $request->payment_type,
                'activated_by' => Auth::user()->id ?? '0',
                'activated_at' => $current_date_time
            ]);
        } else if(($request->type == 2)) {
            DB::table('business_holdings')
            ->where('id', $request->id)
            ->update([
                'user_id' => $request->user_id,
                'status' => $request->status,
                'payment_method_id' => $request->payment_type,
                'activated_by' => Auth::user()->id ?? '0',
                'activated_at' => $current_date_time
            ]);
        }else if(($request->type == 3)) {
            DB::table('business')
            ->where('id', $request->id)
            ->update([
                'user_id' => $request->user_id,
                'status' => $request->status,
                'payment_method_id' => $request->payment_type,
                'activated_by' => Auth::user()->id ?? '0',
                'activated_at' => $current_date_time
            ]);
        }

        $notification = array(
            'message' => "Activated Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('action.search')->with($notification);
    }

    public function edit($id, $type)
    {
        $genders= DB::table('genders')->where('status',1)->get();
        $marital_statuses= DB::table('marital_statuses')->where('status',1)->get();
        $religions= DB::table('religions')->where('status',1)->get();
        $family_classes= DB::table('family_classes')->where('status',1)->get();
        $wards = DB::table('wards')->where('status',1)->get();
        $villages = DB::table('villages')->where('status',1)->get();
        $post_offices = DB::table('post_offices')->where('status',1)->get();
        $sanitations = DB::table('sanitations')->where('status',1)->get();
        $house_types = DB::table('house_types')->where('status',1)->get();
        $occupations = DB::table('occupations')->where('status', 1)->get();
        $payment_methods = DB::table('payment_methods')->where('status', 1)->get();
        $business_types = DB::table('business_types')->where('status', 1)->get();

        if ($type == 1) {
            $user = DB::table('bosot_bari')->where('id', $id)->first();
            return view('admin.active_members.bosotedit', compact('user','type','genders','marital_statuses','religions','family_classes','wards','villages','post_offices','sanitations','house_types','occupations','payment_methods'));
        } else if($type == 2) {
            $user = DB::table('business_holdings')->where('id', $id)->first();
            return view('admin.active_members.holdingedit', compact('user','type','genders','marital_statuses','religions','family_classes','wards','villages','post_offices','sanitations','house_types','occupations','payment_methods'));
        }else if($type == 3) {
            $user = DB::table('business')->where('id', $id)->first();
            return view('admin.active_members.businessedit', compact('user','type','genders','marital_statuses','religions','family_classes','wards','villages','post_offices','sanitations','house_types','occupations','payment_methods','business_types'));
        }



    }

    public function UpdateBosotBari(Request $request,$id){

        try {
            $get_data = DB::table('bosot_bari')->where('id', $id)->first();

            $rules = $request->validate([
                'name' => 'required',
                'father_name' => 'required',
                'mother_name' => 'required',
                'gender' => 'required',
                'martial' => 'required',
                'dob' => 'required',
                'nid' => 'required',
                'family_class' => 'required',
                'mobilenumber' => 'required',
                'religion_id' => 'required',
                'ward_id' => 'required',
                'village_id' => 'required',
                'holding_no' => 'required',
                'post_office_id' => 'required',
                'type_house' => 'required',
                'monthly_income' => 'required',
                'house_year_value' => 'required',
                'yearly_vat' => 'required',
                'occupation_id' => 'required',
                'last_tax_year' => 'required',
                'service_charge' => 'required',
                'payment_type' => 'required',
                'member_male' => 'required',
                'member_female' => 'required',
                'biddut' => 'required',
                'sanitation' => 'required',
                'height' => 'required',
                'width' => 'required',
                'number_room' => 'required',

            ]);

            $data2=array();
            $data2['name'] = $request->name;
            $data2['contact'] = $request->mobile;
            DB::table('users')->where('id',$get_data->user_id)->update($data2);

            $data = array();
            if($request->gurdian_status == "father")
            {
                $data['father'] = $request->father_name;

            }else if($request->gurdian_status == "husband")
            {
                $data['spouse'] = $request->father_name;

            }

            if($request->birth_nid == "nid")
            {
                $data['nid'] = $request->nid;

            }else if($request->birth_nid == "birth_id_no")
            {
                $data['birth_certificate'] = $request->nid;

            }
            $data['mother'] = $request->mother_name;
            $data['gender'] = $request->gender;
            $data['marital_status'] = $request->martial;
            $data['dob'] = $request->dob;
            $data['family_class_id'] = $request->family_class;
            $data['mobile'] = $request->mobilenumber;
            $data['religion'] = $request->religion_id;
            $data['ward_id'] = $request->ward_id;
            $data['village_id'] = $request->village_id;
            $data['holding_no'] = $request->holding_no;
            $data['post_office_id'] = $request->post_office_id;
            $data['total_male'] = $request->member_male;
            $data['total_female'] = $request->member_female;
            $data['biddut'] = $request->biddut;
            $data['sanitation_id'] = $request->sanitation;
            $data['house_type_id'] = $request->type_house;
            $data['monthly_income'] = $request->monthly_income;
            $data['total_room'] = $request->number_room;
            $data['height'] = $request->height;
            $data['width'] = $request->width;
            $data['yearly_value'] = $request->house_year_value;
            $data['yearly_vat'] = $request->yearly_vat;
            $data['occupation_id'] = $request->occupation_id;
            $data['last_tax_year'] = $request->last_tax_year;
            $data['service_charge'] = $request->service_charge;
            $data['payment_method_id'] = $request->payment_type;
            $data['status'] = $request->status;

            if($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('img'), $imageName);
                if($get_data->photo){
                    $file_path = public_path().'/img/'.$get_data->photo;
                    unlink($file_path);
                }
                $data['photo']   =  $imageName;
            }
            DB::table('bosot_bari')->where('id', $id)->update($data);

            return Redirect()->back()->with('message','বসত বাড়ী আপডেট হয়েছে');
            
        } catch (Exception $e) {
           $err_message = \Lang::get($e->getMessage());
           return redirect()->back()->withErrors()->withInput()->with('error','বসত বাড়ী আপডেট হয়নি '); 
       }


   }

   public function UpdateBusinessHolding(Request $request,$id)
   {
    try {
        $get_data = DB::table('business_holdings')->where('id', $id)->first();

        $rules = $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'gender' => 'required',
            'martial' => 'required',
            'dob' => 'required',
            'nid' => 'required',
            'family_class' => 'required',
            'mobilenumber' => 'required',
            'religion_id' => 'required',
            'ward_id' => 'required',
            'village_id' => 'required',
            'holding_no' => 'required',
            'post_office_id' => 'required',
            'type_house' => 'required',
            'monthly_income' => 'required',
            'house_year_value' => 'required',
            'yearly_vat' => 'required',
            'occupation_id' => 'required',
            'last_tax_year' => 'required',
            'service_charge' => 'required',
            'payment_type' => 'required',
            'member_male' => 'required',
            'member_female' => 'required',
            'biddut' => 'required',
            'sanitation' => 'required',
            'height' => 'required',
            'width' => 'required',
            'number_room' => 'required',

        ]);

        $data2=array();
        $data2['name'] = $request->name;
        $data2['contact'] = $request->mobile;
        DB::table('users')->where('id',$get_data->user_id)->update($data2);

        $data = array();
        if($request->gurdian_status == "father")
        {
            $data['father'] = $request->father_name;

        }else if($request->gurdian_status == "husband")
        {
            $data['spouse'] = $request->father_name;

        }

        if($request->birth_nid == "nid")
        {
            $data['nid'] = $request->nid;

        }else if($request->birth_nid == "birth_id_no")
        {
            $data['birth_certificate'] = $request->nid;

        }
        $data['mother'] = $request->mother_name;
        $data['gender'] = $request->gender;
        $data['marital_status'] = $request->martial;
        $data['dob'] = $request->dob;
        $data['family_class_id'] = $request->family_class;
        $data['mobile'] = $request->mobilenumber;
        $data['religion'] = $request->religion_id;
        $data['ward_id'] = $request->ward_id;
        $data['village_id'] = $request->village_id;
        $data['holding_no'] = $request->holding_no;
        $data['post_office_id'] = $request->post_office_id;
        $data['total_male'] = $request->member_male;
        $data['total_female'] = $request->member_female;
        $data['biddut'] = $request->biddut;
        $data['sanitation_id'] = $request->sanitation;
        $data['house_type_id'] = $request->type_house;
        $data['monthly_income'] = $request->monthly_income;
        $data['total_room'] = $request->number_room;
        $data['height'] = $request->height;
        $data['width'] = $request->width;
        $data['yearly_value'] = $request->house_year_value;
        $data['yearly_vat'] = $request->yearly_vat;
        $data['occupation_id'] = $request->occupation_id;
        $data['last_tax_year'] = $request->last_tax_year;
        $data['service_charge'] = $request->service_charge;
        $data['payment_method_id'] = $request->payment_type;
        $data['status'] = $request->status;

        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            if($get_data->photo){
                $file_path = public_path().'/img/'.$get_data->photo;
                unlink($file_path);
            }
            $data['photo']   =  $imageName;
        }
        DB::table('business_holdings')->where('id', $id)->update($data);

        for ($i=0; $i <= count($request->stall_id)-1 ; $i++) { 
         BusinessStall::where('id',$request->stall_id[$i])->update([
          'business_holding_id' => $id,
          'stall_no' =>  $request->stall_no[$i],
          'ownership' =>  $request->ownership[$i],
          'stall_nid' =>  $request->stall_nid[$i],
          'stall_date' =>  $request->stall_date[$i],
          'stall_phone' =>  $request->stall_phone[$i],
          'stall_rent' =>  $request->stall_rent[$i],
          'stall_tax' =>  $request->stall_tax[$i],
      ]);

     }

     return Redirect()->back()->with('message','বাণিজ্যিক হোল্ডিং আপডেট হয়েছে');

 } catch (Exception $e) {
   $err_message = \Lang::get($e->getMessage());
   return redirect()->back()->withErrors()->withInput()->with('error','বাণিজ্যিক হোল্ডিং আপডেট হয়নি '); 
} 
}

public function UpdateBusiness(Request $request,$id)
{
    try {
        $get_data = DB::table('business')->where('id', $id)->first();

        $rules = $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'nid' => 'required',
            'business_type_id' => 'required',
            'mobilenumber' => 'required',
            'ward_id' => 'required',
            'village_id' => 'required',
            'holding_no' => 'required',
            'service_charge' => 'required',
            'payment_type' => 'required',
            'road_moholla' => 'required',
            'shopno' => 'required',
            'business_name' => 'required',
            'business_address' => 'required',
            'current_address' => 'required',
            'permanent_address' => 'required',
            'trade_fee' => 'required',
            'vat' => 'required',
            'signboard_tax' => 'required',
            'business_tax' => 'required',
            'other_tax' => 'required',
            'trade_total' => 'required',


        ]);

        $data2=array();
        $data2['name'] = $request->name;
        $data2['contact'] = $request->mobile;
        DB::table('users')->where('id',$get_data->user_id)->update($data2);

        $data = array();
        if($request->gurdian_status == "father")
        {
            $data['father'] = $request->father_name;

        }else if($request->gurdian_status == "husband")
        {
            $data['spouse'] = $request->father_name;

        }

        if($request->birth_nid == "nid")
        {
            $data['nid'] = $request->nid;

        }else if($request->birth_nid == "birth_id_no")
        {
            $data['birth_certificate'] = $request->nid;

        }
        $data['mother'] = $request->mother_name;
        $data['mobile'] = $request->mobilenumber;
        $data['ward_id'] = $request->ward_id;
        $data['village_id'] = $request->village_id;
        $data['business_type_id'] = $request->business_type_id;
        $data['road_moholla'] = $request->road_moholla;
        $data['shopno'] = $request->shopno;
        $data['business_name'] = $request->business_name;
        $data['business_address'] = $request->business_address;
        $data['current_address'] = $request->current_address;
        $data['permanent_address'] = $request->permanent_address;
        $data['holding_no'] = $request->holding_no;
        $data['trade_fee'] = $request->trade_fee;
        $data['vat'] = $request->vat;
        $data['signboard_tax'] = $request->signboard_tax;
        $data['business_tax'] = $request->business_tax;
        $data['other_tax'] = $request->other_tax;
        $data['trade_total'] = $request->trade_total;
        $data['service_charge'] = $request->service_charge;
        $data['payment_method_id'] = $request->payment_type;
        $data['status'] = $request->status;

        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            if($get_data->photo){
                $file_path = public_path().'/img/'.$get_data->photo;
                unlink($file_path);
            }
            $data['photo']   =  $imageName;
        }
        DB::table('business')->where('id', $id)->update($data);

        return redirect()->back()->with('message','ব্যাবসা প্রতিষ্ঠান আপডেট হয়েছে');

    } catch (Exception $e) {
       $err_message = \Lang::get($e->getMessage());
       return redirect()->back()->withErrors()->withInput()->with('error','ব্যাবসা প্রতিষ্ঠান আপডেট হয়নি '); 
   }

}
}
