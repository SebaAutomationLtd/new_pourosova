<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtherSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtherSettingController extends Controller
{
    public function create($slug)
    {
        $title = str_replace('_', ' ', $slug);
        $title = ucfirst($title);

        $data['slug'] = $slug;
        $data['title'] = $title;

        return view('admin.other_settings.create', $data);
    }

    public function store(Request $request, $slug)
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
            OtherSetting::create([
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
