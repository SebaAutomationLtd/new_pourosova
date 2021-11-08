<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Councilor;
use App\Models\LeftSideApplication;
use App\Models\LeftSideBanner;
use App\Models\Marquee;
use App\Models\RightSideApplication;
use App\Models\RightSideBanner;
use App\Models\Slider;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FrontController extends Controller
{
    public function __construct() {
        $marquees = Marquee::all()->sortByDesc('created_at');
        View::share('marquees', $marquees);
    }

    public function index(){
        $about_pauro = DB::table('about_paurosovas')->first();
        $services = DB::table('services')->get();
        $sliders = Slider::all()->sortByDesc('created_at');
        $services = DB::table('services')->get();
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.index', compact('sliders','about_pauro','services','sliders','councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function administration(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.administration',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function citizen_chartered(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.citizen_chartered' ,compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function contact(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();
        $contact = DB::table('contacts')->first();

        return view('frontend.contact',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees','contact'));
    }

    public function counselor(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.counselor',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }


    public function download(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.download',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function educational_info(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.educational_info',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function engineering_department(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.engineering_department',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function health(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.health',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner'));
    }

    public function information_service_center(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.information_service_center',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function mayor_profile_contact(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.mayor_profile_contact',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function municipality_employee(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.municipality_employee',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function municipality_map(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.municipality_map',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function municipality_organogram(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.municipality_organogram',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function notice(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.notice',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function once_eye(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.once_eye',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function pourosova_info(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.pourosova_info',compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function role_of_honour(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.role_of_honour', compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function uno(){
        $mayor = DB::table('mayors')->first();
        $councilors         = Councilor::where('councilor_type','male')->get();
        $female_councilors  = Councilor::where('councilor_type','female')->get();
        $left_apps          = LeftSideApplication::all()->sortByDesc('created_at');
        $right_links        = RightSideApplication::all()->sortByDesc('created_at');
        $left_banners = LeftSideBanner::all();
        $right_banners = RightSideBanner::all();
        $right_top_banner = DB::table('right_top_banners')->first();
        $marquees = DB::table('marquees')->get();

        return view('frontend.uno' ,compact('councilors',
            'female_councilors','left_apps','right_links', 'mayor', 'left_banners', 'right_banners','right_top_banner','marquees'));
    }

    public function getVillageInfo($id){
        echo $id;
    }



    public function bosot_bari_create() {
        $title = "বসতবাড়ি নিবন্ধন";
        $wards = Ward::all();
        $house_types = DB::table('house_types')->get();
          $right_top_banner = DB::table('right_top_banners')->first();
        return view('frontend.registration.bosot-bari-create', compact('title', 'wards', 'house_types','right_top_banner'));
    }

    public function business_create() {
        $title = "ব্যাবসা প্রতিষ্ঠান নিবন্ধন";
        $wards = Ward::all();
        $business_types = DB::table('business_types')->get();
$right_top_banner = DB::table('right_top_banners')->first();
        return view('frontend.registration.business-create', compact('title', 'wards', 'business_types','right_top_banner'));
    }
    public function business_hold_create() {
        $title = "বানিজ্যিক হোল্ডিং নিবন্ধন";
        $wards = Ward::all();
        $house_types = DB::table('house_types')->get();
        $right_top_banner = DB::table('right_top_banners')->first();
        return view('frontend.registration.business-hold-create', compact('title', 'wards', 'house_types','right_top_banner'));
    }

}


