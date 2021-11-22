<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogActivityController extends Controller
{
    //
    public function index()
    {
        $all_activity = Activity::latest()->get();

//        foreach ($all_activity as $activity) {
//            dump($activity->changes);
//        }
//        exit();

        return view('admin.log-activity', compact('all_activity'));
    }
}
