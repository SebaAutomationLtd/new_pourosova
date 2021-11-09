<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

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
        //  if(!($request->isMethod('post'))){
        //     return view('admin.index');
        // }
        // else{
        //     return view('admin.index');
        //     return 0;
        // }
        $current_date_time = Carbon::now()->toDateTimeString();

        if ($request->type == 1) {
            // $a = DB::table('bosot_bari')->where('id', $request->id)->first();
            //  return $a->name;
            DB::table('bosot_bari')
                ->where('id', $request->id)
                ->update([
                    'user_id' => $request->user_id,
                    'status' => $request->status,
                    'payment_method_id' => $request->payment_type,
                    'activated_by' => Auth::user()->id ?? '0',
                    'activated_at' => $current_date_time
                ]);
            // DB::table('users')
            //     ->where('user_id', $request->user_id_old)
            //     ->updateOrInsert(
            //         [
            //             'user_id' => $request->user_id
            //         ],
            //         [
            //             'show_password' => $request->password,
            //             'password' => bcrypt($request->password),

            //             'name' => $a->name
            //         ]
            //     );
        } else if(($request->type == 2)) {
            // $a = DB::table('business_holdings')->where('id', $request->id)->first();
            DB::table('business_holdings')
                ->where('id', $request->id)
                ->update([
                    'user_id' => $request->user_id,
                    'status' => $request->status,
                    'payment_method_id' => $request->payment_type,
                    'activated_by' => Auth::user()->id ?? '0',
                    'activated_at' => $current_date_time
                ]);
            // DB::table('users')
            //     ->where('user_id', $request->user_id_old)
            //     ->updateOrInsert(
            //         [
            //             'user_id' => $request->user_id
            //         ],

            //         [
            //             'show_password' => $request->password,
            //             'password' => bcrypt($request->password),

            //             'name' => $a->owner_name
            //         ]);
        }else if(($request->type == 3)) {
            // $a = DB::table('business')->where('id', $request->id)->first();
            DB::table('business')
                ->where('id', $request->id)
                ->update([
                    'user_id' => $request->user_id,
                    'status' => $request->status,
                    'payment_method_id' => $request->payment_type,
                    'activated_by' => Auth::user()->id ?? '0',
                    'activated_at' => $current_date_time
                ]);
            // DB::table('users')
            //     ->where('user_id', $request->user_id_old)
            //     ->updateOrInsert(
            //         [
            //             'user_id' => $request->user_id
            //         ],

            //         [
            //             'show_password' => $request->password,
            //             'password' => bcrypt($request->password),

            //             'name' => $a->owner_name
            //         ]);
        }



        // $url = "http://premium.mdlsms.com/smsapi";
        // $data = [
        //     "api_key" => "C2000808603de7bf6e9249.14298062",
        //     "type" => "text",
        //     "contacts" => $request->mobile,
        //     "senderid" => "8809612440735",
        //     "msg" => "অভিনন্দন,আপনার নাগরিক সেবা কার্ড নং  " . $request->user_id . "  সফল ভাবে চালু হয়েছে .সেবা গ্রহনের জন্য আপনার কার্ডের QR কোড স্ক্যান করে লগইন করুন \n\nমাদারগঞ্জ পৌরসভা",
        // ];
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // $response = curl_exec($ch);
        // curl_close($ch);


        // $url = "http://premium.mdlsms.com/smsapi";
        // $data = [
        //     "api_key" => "C2000808603de7bf6e9249.14298062",
        //     "type" => "text",
        //     "contacts" => $request->mobile,
        //     "senderid" => "8809612440735",
        //     "msg" => "নাগরিক সেবা কার্ড চার্জ ১৫০টাকা সফল ভাবে পরিশোধ হয়েছে,কার্ড নং  " . $request->user_id . "\n\n লাল্মনিরহাট পৌরসভা **",
        // ];
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // $response = curl_exec($ch);
        // curl_close($ch);


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

        if ($type == 1) {
            $user = DB::table('bosot_bari')->where('id', $id)->first();
        return view('admin.active_members.bosotedit', compact('user','type','genders','marital_statuses','religions','family_classes','wards','villages','post_offices','sanitations','house_types','occupations','payment_methods'));
        } else if($type == 2) {
            $user = DB::table('business_holdings')->where('id', $id)->first();
        return view('admin.active_members.holdingedit', compact('user','type','genders','marital_statuses','religions','family_classes','wards','villages','post_offices','sanitations','house_types','occupations','payment_methods'));
        }else if($type == 3) {
            $user = DB::table('business')->where('id', $id)->first();
        return view('admin.active_members.businessedit', compact('user','type','genders','marital_statuses','religions','family_classes','wards','villages','post_offices','sanitations','house_types','occupations','payment_methods'));
        }



    }
}
