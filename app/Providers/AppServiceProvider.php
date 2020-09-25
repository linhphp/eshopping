<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\CategoryProduct;
use App\BrandProduct;
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
        //
        view()->composer('homeView.layoutShop.master',function($view){
            $cates = CategoryProduct::all()->pluck('id','name');
            $brands = BrandProduct::all()->pluck('id','name');
            $view->with(['cates' => $cates, 'brands' =>$brands]);
        });
        view()->composer('homeView.layout.master',function($view){
            $cates = CategoryProduct::paginate(4)->pluck('id','name');
            $brands = BrandProduct::paginate(4)->pluck('id','name');
            $view->with(['cates' => $cates, 'brands' =>$brands]);
        });


        //thuc hien xoa mem
        schema::defaultStringLength(191);        
    }
}
