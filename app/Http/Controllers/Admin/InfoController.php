<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:website-settings']);
    }

    /*--------------Info--------------*/
    public function info()
    {
        $infos = DB::table('short_descriptions')->get();
        return view('admin.info.info', compact('infos'));
    }

    public function info_store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['created_by'] = 1;

        $store = DB::table('short_descriptions')->insert($data);
        return redirect(route('admin.web.info.info'))->with('message', 'Info Added');
    }

    public function info_delete($id)
    {
        $delete = DB::table('short_descriptions')->where('id', $id)->delete();
        return redirect(route('admin.web.info.info'))->with('error', 'Info Deleted');
    }

    public function info_edit($id)
    {
        $info = DB::table('short_descriptions')->where('id', $id)->first();
        return view('admin.info.info_edit', compact('info'));
    }

    public function info_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;

        $update = DB::table('short_descriptions')->where('id', $id)->update($data);
        return redirect(route('admin.web.info.info'))->with('message', 'Info Updated');

    }


    /*--------------organogram--------------*/
    public function organogram()
    {
        $organograms = DB::table('organograms')->get();
        return view('admin.info.organogram', compact('organograms'));
    }

    public function organogram_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png|required|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/organogram'), $imageName);

            $data = array();
            $data['title'] = $request->title;
            $data['image'] = $imageName;
            $data['created_by'] = 1;

            $store = DB::table('organograms')->insert($data);
            return redirect(route('admin.web.info.organogram'))->with('message', 'Organogram Added');
        }

    }

    public function organogram_delete($id)
    {

        $old = DB::table('organograms')->where('id', $id)->first();
        if (file_exists(public_path('uploads/organogram/' . $old->image))) {
            unlink(public_path('uploads/organogram/' . $old->image));
        }

        $delete = DB::table('organograms')->where('id', $id)->delete();
        return redirect(route('admin.web.info.organogram'))->with('error', 'Organogram Deleted');
    }

    public function organogram_edit($id)
    {
        $organogram = DB::table('organograms')->where('id', $id)->first();
        return view('admin.info.organogram_edit', compact('organogram'));
    }


    public function organogram_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png|required|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['title'] = $request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/organogram'), $imageName);

            $data['image'] = $imageName;

            $old = DB::table('organograms')->where('id', $id)->first();
            if (file_exists(public_path('uploads/organogram/' . $old->image))) {
                unlink(public_path('uploads/organogram/' . $old->image));
            }

        }

        $update = DB::table('organograms')->where('id', $id)->update($data);
        return redirect(route('admin.web.info.organogram'))->with('message', 'Organogram Updated');

    }


    /*--------------map--------------*/
    public function map()
    {
        $maps = DB::table('maps')->get();
        return view('admin.info.map', compact('maps'));
    }

    public function map_store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png|required|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/organogram'), $imageName);

            $data = array();
            $data['title'] = $request->title;
            $data['image'] = $imageName;
            $data['created_by'] = 1;

            $store = DB::table('maps')->insert($data);
            return redirect(route('admin.web.info.map'))->with('message', 'Map Added');
        }

    }

    public function map_delete($id)
    {

        $old = DB::table('maps')->where('id', $id)->first();
        if (file_exists(public_path('uploads/organogram/' . $old->image))) {
            unlink(public_path('uploads/organogram/' . $old->image));
        }

        $delete = DB::table('maps')->where('id', $id)->delete();
        return redirect(route('admin.web.info.map'))->with('error', 'Map Deleted');
    }

    public function map_edit($id)
    {
        $map = DB::table('maps')->where('id', $id)->first();
        return view('admin.info.map_edit', compact('map'));
    }


    public function map_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png|required|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['title'] = $request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/organogram'), $imageName);

            $data['image'] = $imageName;

            $old = DB::table('maps')->where('id', $id)->first();
            if (file_exists(public_path('uploads/organogram/' . $old->image))) {
                unlink(public_path('uploads/organogram/' . $old->image));
            }

        }

        $update = DB::table('maps')->where('id', $id)->update($data);
        return redirect(route('admin.web.info.map'))->with('message', 'Map Updated');

    }


    /*--------------employee--------------*/
    public function employee()
    {
        $employees = DB::table('employees')->get();
        return view('admin.info.employee', compact('employees'));
    }

    public function employee_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png|required|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/organogram'), $imageName);

            $data = array();
            $data['title'] = $request->title;
            $data['image'] = $imageName;
            $data['created_by'] = 1;

            $store = DB::table('employees')->insert($data);
            return redirect(route('admin.web.info.employee'))->with('message', 'Employee Added');
        }

    }

    public function employee_delete($id)
    {

        $old = DB::table('employees')->where('id', $id)->first();
        if (file_exists(public_path('uploads/organogram/' . $old->image))) {
            unlink(public_path('uploads/organogram/' . $old->image));
        }

        $delete = DB::table('employees')->where('id', $id)->delete();
        return redirect(route('admin.web.info.employee'))->with('error', 'Employee Deleted');
    }

    public function employee_edit($id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        return view('admin.info.employee_edit', compact('employee'));
    }


    public function employee_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png|required|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['title'] = $request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/organogram'), $imageName);

            $data['image'] = $imageName;

            $old = DB::table('employees')->where('id', $id)->first();
            if (file_exists(public_path('uploads/organogram/' . $old->image))) {
                unlink(public_path('uploads/organogram/' . $old->image));
            }

        }

        $update = DB::table('employees')->where('id', $id)->update($data);
        return redirect(route('admin.web.info.employee'))->with('message', 'Employee Updated');

    }


    /*--------------education--------------*/
    public function education()
    {
        $educations = DB::table('educations')->get();
        return view('admin.info.education', compact('educations'));
    }

    public function education_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|max:255',
            'total' => 'required|numeric',
            'type_of_organization' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['type'] = $request->type;
        $data['total'] = $request->total;
        $data['type_of_organization'] = $request->type_of_organization;
        $data['created_by'] = auth()->id();

        $store = DB::table('educations')->insert($data);
        return redirect(route('admin.web.info.education'))->with('message', 'Education Added');
    }

    public function education_delete($id)
    {
        $delete = DB::table('educations')->where('id', $id)->delete();
        return redirect(route('admin.web.info.education'))->with('error', 'Education Deleted');
    }

    public function education_edit($id)
    {
        $education = DB::table('educations')->where('id', $id)->first();
        return view('admin.info.education_edit', compact('education'));
    }


    public function education_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|max:255',
            'total' => 'required|numeric',
            'type_of_organization' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['type'] = $request->type;
        $data['total'] = $request->total;
        $data['type_of_organization'] = $request->type_of_organization;

        $update = DB::table('educations')->where('id', $id)->update($data);
        return redirect(route('admin.web.info.education'))->with('message', 'Education Updated');

    }


    /*--------------contact--------------*/
    public function contact()
    {
        $contact = DB::table('contacts')->first();
        return view('admin.info.contact', compact('contact'));
    }

    public function contact_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|max:255',
            'telephone' => 'required|min:11|max:11',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['address'] = $request->address;
        $data['telephone'] = $request->telephone;
        $data['email'] = $request->email;
        $data['created_by'] = 1;

        $store = DB::table('contacts')->insert($data);
        return redirect(route('admin.web.info.contact'))->with('message', 'Contact Added');
    }

    public function contact_delete($id)
    {
        $delete = DB::table('contacts')->where('id', $id)->delete();
        return redirect(route('admin.web.info.contact'))->with('error', 'Contact Deleted');
    }

    public function contact_edit($id)
    {
        $contact = DB::table('contacts')->where('id', $id)->first();
        return view('admin.info.contact_edit', compact('contact'));
    }

    public function contact_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|max:255',
            'telephone' => 'required|min:11|max:11',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['address'] = $request->address;
        $data['telephone'] = $request->telephone;
        $data['email'] = $request->email;

        $update = DB::table('contacts')->where('id', $id)->update($data);
        return redirect(route('admin.web.info.contact'))->with('message', 'Contact Updated');

    }


}
