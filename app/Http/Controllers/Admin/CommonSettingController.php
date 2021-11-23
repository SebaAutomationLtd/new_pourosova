<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommonSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommonSettingController extends Controller
{
    public function create()
    {
        $common_settings = CommonSetting::whereIn('group',
            ['pourosova_name_bn', 'pourosova_name_en',
                'pourosova_address', 'mayor_name', 'web_url'])->get();

        foreach ($common_settings as $setting) {
            $object[$setting->group] = $setting->name;
        }
        $data = isset($object) ? (object) $object : (object) [];
        return view('admin.common_settings.create', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->withErrors($validator)->withInput();
        }

        try {
            foreach ($request->except('_token') as $key => $value) {
                 CommonSetting::updateOrCreate(
                    ['group' => $key],
                    ['name' => $value]
                );
            }

        } catch (\Exception $exception) {
            $notification = array(
                'message' => 'Error occurred while saving!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' => 'Data saved successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function common_settings($slug)
    {
        $title = str_replace('_', ' ', $slug);
        $title = ucfirst($title);

        $data['slug'] = $slug;
        $data['title'] = $title;

        return view('admin.common_settings.index', $data);
    }

    public function store_common_settings(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->withErrors($validator)->withInput();
        }

        $title = str_replace('_', ' ', $slug);
        $title = ucfirst($title);

        try {
            CommonSetting::create([
                'group' => $slug,
                'name' => $request->name,
                'created_by' => auth()->id()
            ]);
        } catch (\Exception $exception) {
            $notification = array(
                'message' => 'Could not create '.$title,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' => $title . ' created successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
