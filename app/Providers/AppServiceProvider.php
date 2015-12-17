<?php

namespace App\Providers;


use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use DB;
use Schema;
use Illuminate\Database\Schema\Blueprint;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('ads')) {
            $ads = DB::table("ads")
                ->where('end_date', '>=', Carbon::now())
                ->where('start_date', '<=', Carbon::now())
                ->orderBy(DB::raw('RAND()'))
                ->take(3)
                ->get();
            view()->share('ads', $ads);
        }
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
