<?php

namespace App\Providers;

use App\GlobalSetting;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $global_setting = GlobalSetting::find(1);
        $config = [
            'persen' => $global_setting->persen,
            'inforekening' => $global_setting->inforekening,
        ];
        config()->set(['app.global_setting' => $config]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}