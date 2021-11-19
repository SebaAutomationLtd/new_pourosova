<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SonodApply;
use App\Models\TradeLicence;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use DB;
use PDF;
use Config;

class MemberAccessController extends Controller
{
    public function login_page()
    {
        return view('frontend.member.member_login_page');
    }

    public function login(Request $request)
    {
        $data = $request->all();
        if (\Illuminate\Support\Facades\Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            return redirect()->route('member.dashboard');
        } else {
            $notification = array(
                'message' => 'Email Or Password Invalid',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function MemberDashboard()
    {
        $data = null;
        $user_type = null;

        $user = User::with(['bosotbariholding', 'businessholding'])->where('id', auth()->id())->first();
        if ($user->business) {
            $data = $user->business;
            $user_type = 'business';
        } elseif ($user->businessholding) {
            $data = $user->businessholding;
            $user_type = 'business_holding';
        } elseif ($user->bosotbariholding) {
            $data = $user->bosotbariholding;
            $user_type = 'bosot_bari';
        }

        return view('frontend.member.member_dashboard', compact('user', 'data', 'user_type'));
    }

    public function member_change_password()
    {
        return view('frontend.member.member_change_password');
    }

    public function MemberSebaApply()
    {
        $data['sonods'] = DB::table('sonod_setting')->get();
        return view('frontend.member.sebaapply', $data);
    }

    public function sonod_create($id, $title)
    {
        $data = [
            'id' => $id,
            'title' => $title
        ];
        return view('frontend.member.sonod_create', $data);
    }

    public function member_update_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:3|max:100',
            'new_password' => 'required|min:3|max:100',
            'confirm_password' => 'required|min:3|max:100',
        ]);

        $current_user = Auth()->user();

        if (Hash::check($request->old_password, $current_user->password)) {

            if ($request->new_password == $request->confirm_password) {

                User::find($current_user->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);

                return redirect(route('member.dashboard'))->with('message', 'Password Successfully Changes');

            } else {
                return redirect(route('member.change_password'))->with('error', 'Password and Confirm Password do not match');
            }

        } else {
            return redirect(route('member.change_password'))->with('error', 'Old Password do not match');
        }

    }


    public function member_photo_update(Request $request)
    {
        $id = Auth()->user()->id;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);

            $data = array();
            $data['photo'] = 'uploads/users/' . $imageName;
            $update = DB::table('users')->where('id', $id)->update($data);
            return redirect(route('member.dashboard'))->with('message', 'Profile Picture Updated');

        }


    }

    public function sonod_store(Request $request)
    {

        try {
            $validated = $request->validate([
                'name' => 'required|max:150|min:2',
                'mother' => 'required|max:150|min:2',
                'nid' => 'required|max:20|min:2',
                'dob' => 'required|date',
            ]);

            $sonod = SonodApply::create($request->all());
            $sonod->applied_by = Auth::user()->id;
            $sonod->save();

            return redirect()->back()->with('success', 'সনদ আবেদন গৃহীত হয়েছে।');


        } catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'দুঃখিত... সনদ আবেদন গৃহীত হয়নি ।');
        }
    }

    public function trade_store(Request $request)
    {
        try {
            $this->validate($request, [
                'business_name' => 'required|max:150|min:2',
                'business_type_id' => 'required|max:150',
                'father_name' => 'required|max:150|min:2',
                'mother' => 'required|max:150|min:2',
                'nid' => 'required|max:20|min:2',
                'mobile' => 'required|min:2|max:11',
                'ward_id' => 'required|max:150',
                'road_moholla' => 'required|max:150|min:2',
                'address' => 'required|max:650|min:2',
                'current_address' => 'required|max:650|min:2',
                'permanent_address' => 'required|max:650|min:2',
                'photo' => 'required|mimes:jpeg,png,jpg|max:1024',
            ]);
            $sonod = new SonodApply();
            $sonod->name = $request->name;
            $sonod->sonod_setting_id = $request->sonod_setting_id;
            if ($request->gurdian_status == "father") {
                $sonod->father = $request->father_name;

            } else if ($request->gurdian_status == "husband") {
                $sonod->husband = $request->father_name;

            }

            if ($request->birth_nid == "nid") {
                $sonod->nid = $request->nid;

            } else if ($request->birth_nid == "birth_id_no") {
                $sonod->birth_certificate = $request->nid;

            }
            $sonod->mother = $request->mother;
            $sonod->address = $request->address;
            $sonod->applied_by = Auth::user()->id;
            $sonod->save();

            $trade_licence = new TradeLicence();
            $trade_licence->sonod_apply_id = $sonod->id;
            $trade_licence->business_name = $request->business_name;
            $trade_licence->business_type_id = $request->business_type_id;
            $trade_licence->mobile = $request->mobile;
            $trade_licence->ward_id = $request->ward_id;
            $trade_licence->road_moholla = $request->road_moholla;
            $trade_licence->current_address = $request->current_address;
            $trade_licence->permanent_address = $request->permanent_address;
            $trade_licence->applied_by = Auth::user()->id;
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('trade_licence/trade_licence'), $imageName);
                $trade_licence->photo = 'trade_licence/trade_licence/' . $imageName;
            }
            $trade_licence->save();

            return redirect()->back()->with('success', 'সনদ আবেদন গৃহীত হয়েছে।');


        } catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'দুঃখিত... সনদ আবেদন গৃহীত হয়নি ।');
        }
    }

    public function SonodRequest($id)
    {
        $all = DB::table('sonod_apply')->where('applied_by', Auth::user()->id)->where('sonod_setting_id', $id)->orderBy('id', 'DESC')->get();
        $headings = DB::table('sonod_setting')->where('id', $id)->first();
        return view('frontend.member.sonod', compact('all', 'headings'));
    }

    public function SonodDownload($id, $id2)
    {

        Config::set('pdf.orientation', 'P');
        $data = DB::table('sonod_apply')->where('id', $id)->first();
        $headings = DB::table('sonod_setting')->where('id', $id2)->first();
        if ($id2 == '5') {
            $members = DB::table('warish_members')->where('sonod_apply_id', $data->id)->get();
            $pdf = PDF::loadView('report.sonod', compact('data', 'headings', 'members'));
        } else {
            $pdf = PDF::loadView('report.sonod', compact('data', 'headings'));
        }
        return $pdf->download($headings->title . '.pdf');

    }

    public function TradeDownload($id, $id2)
    {

        Config::set('pdf.orientation', 'P');
        $data = DB::table('sonod_apply')->where('id', $id)->first();
        $tradeinfo = DB::table('trade_licence')->where('sonod_apply_id', $data->id)->first();
        $headings = DB::table('sonod_setting')->where('id', $id2)->first();
        $business_type = DB::table('business_types')->where('id', $tradeinfo->business_type_id)->first();

        $timestamp = strtotime($data->created_at);
        $month = date('m', $timestamp);
        if ($month < '7') {
            $businessyear = date('Y', strtotime('-1 year')) . '-' . date('Y');
        } else {
            $businessyear = date('Y') . '-' . date('Y', strtotime('+1 year'));
        }
        $pdf = PDF::loadView('report.trade', compact('data', 'headings', 'tradeinfo', 'business_type', 'businessyear'));
        return $pdf->download($headings->title . '.pdf');

    }

    public function trade()
    {
        Config::set('pdf.orientation', 'P');

        $pdf = PDF::loadView('report.trade');
        return $pdf->download('trade.pdf');
    }


}
