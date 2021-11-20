<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SonodApply;
use Illuminate\Http\Request;

class SonodController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:certificate-list']);
    }
    //
    public function index()
    {
        $all = SonodApply::where('status',0)->latest()->get();
        return view('admin.sonod.index', compact('all'));
    }

    public function approve($id)
    {
        $sonod = SonodApply::findOrFail($id);
        $sonod->status = 1;
        $sonod->approved_by = auth()->id();
        $sonod->approved_date = now();
        $sonod->save();

        $notification = array(
            'message' => "Sonod Approved",
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function pending($id)
    {
        $sonod = SonodApply::findOrFail($id);
        $sonod->status = 0;
        $sonod->approved_by = null;
        $sonod->approved_date = null;
        $sonod->save();

        $notification = array(
            'message' => "Sonod Pending",
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
