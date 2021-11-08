<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
    public function boot(){
        Schema::defaultStringLength(191);

        $website_settings = DB::table('website_settings')->get();
        foreach ($website_settings as $setting) {
            $data[$setting->name] = $setting->value;
        }
        $object = isset($data) ? (object) $data : (object) [];

        View::share('website_data', $object);
    }
}
