<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\helper\tuido;
use App\Models\sanpham;
use App\Models\loai;
use App\Models\about;
use App\Models\about2;
use App\Models\footer;
use App\Models\slide;
use App\Models\bia;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        view()->composer('*',function($view){
            $view->with([  
                'tuido'=>new tuido(),
                // 'loai'=>loai::where('trangthai',0)->orderBy('loai','ASC')->get(),
                'slide'=>slide::orderBy('id','DESC')->get(),
                'bia'=>bia::orderBy('id','DESC')->get(),
                'about'=>about::orderBy('id','DESC')->first(),
                'about2'=>about2::orderBy('id','DESC')->first(),
                'footer'=>footer::orderBy('id','DESC')->first(),
            ]);
        });

    }
}
