<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
       if (env('APP_ENV') === 'production') {
            // Change all links to https.
            \URL::forceSchema('https');
        }
        view()->composer('sections.top_posts', function($view){
            $posts=\App\Post::orderBy('view', 'DESC')->withTranslation(\App::getLocale())->limit(10)->whereTranslation('title', '!=', '', [\App::getLocale()])->get();
            $right_ad=\App\Advert::where('position', 'right')->first();
            $view->with(compact('posts', 'right_ad'));
        });

        view()->composer('layouts.site', function($view){
            $footer_menus=\App\FooterMenu::withTranslation(\App::getLocale())->orderBy('order', 'ASC')->get();
            $str=file_get_contents("http://cbu.uz/ru/arkhiv-kursov-valyut/json/");
            $json=json_decode($str, true);
            $top_ad=\App\Advert::where('position', 'top')->first();
            $menus=\App\Category::withTranslation(\App::getLocale())->orderBy('order', 'ASC')->get();
            $view->with(compact('top_ad', 'menus', 'json', 'footer_menus'));
        });

        
        
    }
}
