<?php

namespace doctype_admin\Blog;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
     /**
      * Bootstrap Doctype Admin Blog Services
      *
      *@return void
     */

     public function boot()
     {
        if($this->app->runningInConsole())
        {
            $this->registerPublishing();
        }
        $this->registerResources();
     }

         /**
     * Register Doctype Admin Blog Services
     * 
     * @return void
     */

    public function register()
    {
        //
    }

     /**
      * Return Package resources
      *
     */

     private function registerResources()
     {
         $this->loadMigrationsFrom(__DIR__.'/../database/migartions');
         $this->loadFactoriesFrom(__DIR__.'/../database/factories');
         $this->loadViewsFrom(__DIR__.'/../resources/views','blog');
         $this->registerRoutes();
     }

     /**
      * Register Congig File
      *
     */
     protected function registerPublishing()
     {
         $this->publishes([
             __DIR__.'/../config/blog.php' => config_path('blog.php')
         ],'blog');
     }

     protected function registerRoutes()
     {
         Route::group($this->routeConfiguration(),function(){
             $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
         });
     }

     private function routeConfiguration()
     {
         return [
             'prefix' => 'admin',
             'namespace' => 'doctype_admin\Blog\Http\Controllers'
         ];
     }
}