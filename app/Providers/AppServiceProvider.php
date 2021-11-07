<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Marquee;
use App\Models\Slider;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $website_settings = DB::table('website_settings')->get();
        foreach ($website_settings as $setting) {
            $data[$setting->name] = $setting->value;
        }
        $object = (object) $data ?? [];
        $marquees = Marquee::all()->sortByDesc('created_at');
        View::share([
            'marquees' => $marquees,
            'website_data' => $object
        ]);
    }
}
