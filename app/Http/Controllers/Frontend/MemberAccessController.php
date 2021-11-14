<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use DB;

class MemberAccessController extends Controller
{
    public function MemberDashboard()
    {	
    	$user =User::with(['bosotbariholding','businessholding'])->where('id',auth()->id())->first();
        return view('frontend.member.member_dashboard',compact('user'));
    }

    public function member_change_password()
    {
        return view('frontend.member.member_change_password');
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


    
}
