<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BosotBariHolding;
use App\Models\BusinessHolding;
use App\Models\Village;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Config;

class PdfReportController extends Controller
{
    //
    public function khosora_report()
    {

        $wards = Ward::whereStatus(1)->get();
        $villages = Village::whereStatus(1)->get();

        return view('admin.reports.index', compact('wards', 'villages'));

    }

    public function khosora_report_download(Request $request)
    {
        $config = ['instanceConfigurator' => function ($mpdf) {
            $mpdf->SetWatermarkImage('  img/BangladeshGovt.svg');
            $mpdf->showWatermarkImage = true;
            $mpdf->watermarkImageAlpha = 0.2;
        }];

        $ward = Ward::find($request->ward_id);
        $village = Village::find($request->village_id);

        if ($request->report_type == 'bosot_bari') {
            $data = BosotBariHolding::with('house_type');

            if ($request->ward_id) {
                $data = $data->where('ward_id', $request->ward_id);
            }
            if ($request->village_id) {
                $data = $data->where('village_id', $request->ward_id);
            }

            $data = $data->get();

            $pdf = PDF::loadView('admin.reports.bosotbari-khosora-report', compact('data', 'ward', 'village'), [], $config);

            return $pdf->download('বসতবাড়ি খসড়া রিপোর্ট.pdf');

        } elseif ($request->report_type == 'business_hold') {

            $data = new BusinessHolding();

            if ($request->ward_id) {
                $data = $data->where('ward_id', $request->ward_id);
            }
            if ($request->village_id) {
                $data = $data->where('village_id', $request->ward_id);
            }

            $data = $data->get();


            $pdf = PDF::loadView('admin.reports.business-hold-khosora-report', compact('data', 'ward', 'village'), [], $config);

            return $pdf->download('বানিজ্যিক ভবন খসড়া রিপোর্ট.pdf');
        } else {
            $notification=array(
                'messege'=>'অনুগ্রহ পূর্বক রিপোর্টের ধরন সিলেক্ট করুন',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }


    }

    public function punobibaho()
    {
            Config::set('pdf.orientation', 'P');
            $pdf = PDF::loadView('report.punobibaho');
            return $pdf->download('পুন বিবাহ.pdf');


    }

    public function warish()
    {
            Config::set('pdf.orientation', 'P');
            $pdf = PDF::loadView('report.warish');
            return $pdf->download('warish.pdf');


    }
    public function newreport()
    {
            Config::set('pdf.orientation', 'P');
            $pdf = PDF::loadView('report.newreport');
            return $pdf->download('newreport.pdf');


    }
}
