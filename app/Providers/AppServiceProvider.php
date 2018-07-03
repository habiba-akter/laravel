<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('frontEnd.layouts.header', function(){
        $allPublishedCategories = Category::Where('publication_status',1)->get();
        View::share('allPublishedCategories',$allPublishedCategories);
       });
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
