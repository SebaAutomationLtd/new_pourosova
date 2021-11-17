<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SonodApply;
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
        if(\Illuminate\Support\Facades\Auth::attempt(['username'=> $data['username'], 'password'=>$data['password']])){
            return redirect()->route('member.dashboard');
        }else{
            $notification=array(
                'message'=>'Email Or Password Invalid',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function MemberDashboard()
    {
    	$user =User::with(['bosotbariholding','businessholding'])->where('id',auth()->id())->first();
    	$data = $user->bosotbariholding ?? $user->businessholding;
        return view('frontend.member.member_dashboard',compact('user', 'data'));
    }

    public function member_change_password()
    {
        return view('frontend.member.member_change_password');
    }

    public function MemberSebaApply(){
         $data['sonods'] = DB::table('sonod_setting')->get();
        return view('frontend.member.sebaapply', $data);
    }
    public function sonod_create($id, $title){
        $data = [
            'id'=>$id,
            'title'=>$title
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

        if (Hash::check($request->old_password,$current_user->password)) {

            if ($request->new_password == $request->confirm_password) {

                User::find($current_user->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);

                return redirect(route('member.dashboard'))->with('message','Password Successfully Changes');

            }else{
            	return redirect(route('member.change_password'))->with('error','Password and Confirm Password do not match');
            }

        }else{
        	return redirect(route('member.change_password'))->with('error','Old Password do not match');
        }

    }


    public function member_photo_update(Request $request)
    {
        $id = Auth()->user()->id;

         if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);

            $data =array();
            $data['photo']='uploads/users/'.$imageName;

            /*$old = DB::table('users')->where('id',$id)->first();
            if (file_exists(public_path('img/users/'.$old->photo))) {
                unlink(public_path('img/users/'.$old->photo));
            }*/

            $update = DB::table('users')->where('id',$id)->update($data);
            return redirect(route('member.dashboard'))->with('message','Profile Picture Updated');

        }



    }

    public function sonod_store(Request $request)
    {

        try {
            $validated = $request->validate([
                'name' => 'required|max:150|min:2',
                'mother' => 'required|max:150|min:2',
                'nid' => 'max:20|min:2',
                'dob' => 'required|date',
            ]);

            $sonod = SonodApply::create($request->all());
            $sonod->applied_by = Auth::user()->id;
            $sonod->save();

            return redirect()->back()->with('success','সনদ আবেদন গৃহীত হয়েছে।');


        } catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
//            dd($err_message);
            return redirect()->back()->withInput()->with('error','দুঃখিত... সনদ আবেদন গৃহীত হয়নি ।');
        }
    }


    public function SonodRequest($id){
      $all = DB::table('sonod_apply')->where('applied_by', Auth::user()->id)->where('sonod_setting_id',$id)->orderBy('id', 'DESC')->get();
      $headings = DB::table('sonod_setting')->where('id',$id)->first();
        return view('frontend.member.sonod', compact('all','headings'));   
    }

    public function SonodDownload($id,$id2){

            Config::set('pdf.orientation', 'P');
            $data= DB::table('sonod_apply')->where('id',$id)->first();
            $headings = DB::table('sonod_setting')->where('id',$id2)->first();
            if($id2=='5'){
                $members = DB::table('warish_members')->where('sonod_apply_id',$data->id)->get();
            $pdf = PDF::loadView('report.sonod',compact('data','headings','members'));
            }else {
                $pdf = PDF::loadView('report.sonod',compact('data','headings'));
            }
            return $pdf->download($headings->title.'.pdf');

    }



}
