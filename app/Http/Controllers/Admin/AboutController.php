<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
    public function index()
    {
        $about_puaro = DB::table('about_paurosovas')->first();
        return view('admin.about_paurosova.about_paurosova', compact('about_puaro'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $data = WebsiteSetting::whereName('about_pourosova');

        if ($data->first()) {
            $data->update([
                'value' => $request->description
            ]);
        } else {
            WebsiteSetting::create([
                'name' => 'about_pourosova',
                'value' => $request->description,
                'created_by' => auth()->id()
            ]);
        }

        return redirect(route('admin.web.right.about_paurosova'))->with('message', 'About Updated');

    }
}
