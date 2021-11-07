<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMayor;
use App\Models\ProfessionalMayor;
use App\Models\Uno;
use App\Models\Admin;
use App\Models\AdminOther;
use App\Models\Info;
use App\Models\Engineer;
use App\Models\OtherEmployee;

class ContactController extends Controller
{
    public function mayor(){
        $professional_mayors = ProfessionalMayor::all();
        return view('admin.contact.mayor',compact('professional_mayors'));
    }
    public function mayor_store(Request $request){
        $request->validate([
            'mayor_name'    =>'required',
            'contact'       =>'required',
            'email'         =>'required',
            'father'        =>'required',
            'mother'        =>'required',
            'date_birth'    =>'required' ,
            'present_address' =>'required',
            'permanent_address' =>'required',
            'nationality'   =>'required',
            'religion'      =>'required',
            'gender'        =>'required',
            'marital_status'=>'required',
            'latest_degree' =>'required',
            'blood_group'   =>'required'
        ]);
        ContactMayor::create([
            'mayor_name'    =>$request->mayor_name,
            'contact'       =>$request->contact,
            'email'         =>$request->email,
            'father'        =>$request->father,
            'mother'        =>$request->mother,
            'date_birth'    =>$request->date_birth ,
            'present_address' =>$request->present_address ,
            'permanent_address' =>$request->permanent_address,
            'nationality'   =>$request->nationality ,
            'religion'      =>$request->religion,
            'gender'        =>$request->gender,
            'marital_status'=>$request->marital_status,
            'latest_degree' =>$request->latest_degree,
            'blood_group'   =>$request->blood_group,
            'created_by'    =>1, 
        ]);
        return redirect()->back()->with('success','মেয়রের তথ্য অ্যাড করা হয়েছে');
    }
    public function professional_mayor_store(Request $request){
        $request->validate([
            'designation'    =>'required',
            'institute_name' =>'required',
        ]);
        ProfessionalMayor::create([
            'designation'    => $request->designation,
            'institute_name' => $request->institute_name,
            'created_by'     =>1 
        ]);
        return redirect()->back();
    }
    public function uno(){
        $uno = Uno::first();
        return view('admin.contact.uno',compact('uno'));
    }
    public function uno_store(Request $request){
        $request->validate([
            'name'          => 'required',
            'designation'   => 'required',
            'email'         => 'required',
            'contact'       => 'required',
            'telephone'     => 'required',
            'photo'         => 'required',
        ]);
        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uno/img'), $imageName);

            Uno::create([
                'name'          => $request->name,
                'designation'   => $request->designation,
                'email'         => $request->email,
                'contact'       => $request->contact,
                'telephone'     => $request->telephone,
                'photo'         => $imageName,
                'created_by'    => 1
            ]);  
            return redirect()->back()->with(['success'=>'উপজেলা নির্বাহী কর্মকর্তা অ্যাড করা হয়েছে']);
        }
      
    }
    public function admin(){
        $admin = Admin::first();
        $employees = AdminOther::get();
        return view('admin.contact.admin',compact('admin','employees'));
    }
    public function admin_store(Request $request){
        $request->validate([
            'name'          => 'required',
            'designation'   => 'required',
            'email'         => 'required',
            'contact'       => 'required',
            'telephone'     => 'required',
            'photo'         => 'required',
        ]);
        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('admin/img'), $imageName);

            Admin::create([
                'name'          => $request->name,
                'designation'   => $request->designation,
                'email'         => $request->email,
                'contact'       => $request->contact,
                'telephone'     => $request->telephone,
                'photo'         => $imageName,
                'created_by'    => 1
            ]);  
            return redirect()->back();
        }
      
    }
    public function admin_other_employee(Request $request){
           $request->validate([
            'name'          => 'required',
            'designation'   => 'required',
            'contact'   => 'required',
            ]);
            AdminOther::create([
                'name'          => $request->name,
                'designation'   => $request->designation,
                'contact'       => $request->contact,
                'created_by'    => 1
            ]);
           return redirect()->back();
    }
    public function engineer(){
        $engineer = Engineer::first();
        $engineer_other_employees = OtherEmployee::get();
        return view('admin.contact.engineer',compact('engineer','engineer_other_employees'));
    }
    public function engineer_store(Request $request){
          $request->validate([
            'name'        => 'required',
            'designation' => 'required',
            'email'       => 'required',
            'contact'     => 'required',
            'telephone'   => 'required',
            'photo'       =>'required',
        ]);
       
        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('engineer/img'), $imageName);

            Engineer::create([
                'name'          => $request->name,
                'designation'   => $request->designation,
                'email'         => $request->email,
                'contact'       => $request->contact,
                'telephone'     => $request->telephone,
                'photo'         => $imageName,
                'created_by'    => 1
            ]);  
            return redirect()->back();
        }
    }
    public function others_employee(Request $request){
        $request->validate([
            'name'        => 'required',
            'designation' => 'required',
            'contact'     => 'required',
        ]);
        OtherEmployee::create([
            'name'          => $request->name,
            'designation'   => $request->designation,
            'contact'       => $request->contact,
            'created_by'    => 1
        ]);
        return redirect()->back();

    }
    public function info(){
        return view('admin.contact.info');
    }
    public function info_store(Request $request){
           $request->validate([
            'title'          => 'required',
            'info_type'      => 'required',
            'description'    => 'required',
            'photo'          => 'required',
        ]);
        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('info/img'), $imageName);

            Info::create([
                'title'         => $request->title,
                'info_type'     => $request->info_type,
                'description'   => $request->description,
                'photo'         => $imageName,
                'created_by'    => 1
            ]);  
            return redirect()->back();
        }      
    }
}
