<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{
      //Get Vilage Info

    public function getvillageinfo($id) {
        $count = DB::table('villages')->where('ward_id', $id)->count();
        $data = DB::table('villages')->where('ward_id', $id)->get();
        if ($count == 0) {
            echo "no_data";
        } else {
            echo'<option value="" selected="" disabled="">নির্বাচন করুন</option>';
            foreach ($data as $row) {
                echo'<option value="' . $row->id . '">' . $row->name . '</option>';
            }
        }
    }


     public function getdistrictinfo($id) {
        $count = DB::table('districts')->where('id', $id)->count();
        $data = DB::table('districts')->where('id', $id)->get();
        if ($count == 0) {
            echo "no_data";
        } else {
            echo'<option value="" selected="" disabled="">নির্বাচন করুন</option>';
            foreach ($data as $row) {
                echo'<option value="' . $row->id . '">' . $row->bn_name . '</option>';
            }
        }
    }


    public function getupazilainfo($id) {
        $count = DB::table('upazilas')->where('id', $id)->count();
        $data = DB::table('upazilas')->where('id', $id)->get();
        if ($count == 0) {
            echo "no_data";
        } else {
            echo'<option value="" selected="" disabled="">নির্বাচন করুন</option>';
            foreach ($data as $row) {
                echo'<option value="' . $row->id . '">' . $row->bn_name . '</option>';
            }
        }
    }


        public function getduplicatebirthnid($data, $number) {
        $niddata = DB::table('bosot_bari')->where(['nid' => $number])->count();
        $birthdata = DB::table('bosot_bari')->where(['birth_certificate' => $number])->count();
        if ($data == 'NID') {
            if ($niddata > 0) {
                $message = 'দুঃখিত, এই এন আই ডি নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        } else {
            if ($birthdata > 0) {
                $message = 'দুঃখিত, এই জন্ম নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        }
        return $message;
    }

    public function getduplicatenumber($number) {
        if (strlen($number) != 11) {
            $message = 'মোবাইল নম্বর কমপক্ষে ১১  সংখ্যার হতে হবে !';
        } else {
            $result = DB::table('users')->where(['contact' => $number])->count();
            if ($result > 0) {
                $message = 'এই মোবাইল নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        }
        return $message;
    }
}
