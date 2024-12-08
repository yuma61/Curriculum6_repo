<?php

// It is located in app/Providers/AppServiceProvider.php
// This file is a service provider in Laravel.
// Service providers are the central place for bootstrapping application services, 
// registering bindings in the service container, and performing other initialization tasks

// What AppServiceProvider does
// 1. Helps bootstrap the application during its initialization phase by
//      setting the default configurations
//      sharing data accross view
//      Binding interfaces to implementations in the service container
//      Extending or customizing Laravel's default behaviour

// Bootstrap
// It is a technique of loading a program into a computer by means of a few initial
// instructions which enable the introduction of the rest of the program from an input device.

// Bootstrapを使うメリット
// デザインがわからなくてもＵＩが楽に作れる
// レスポンシブ対応が楽

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

// pagination
// It is the process of dividing a large set of data into smaller chunks
// (pages) to display them incrementally. 
// It is used to efficiently manage and display large dataset. 
// It enhances user experience, performance, and readability. 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        Paginator::useBootstrap();
        // useBootstrap() tells Laravel to format the pagincation links using bootstrap's HTML and CSS classes. 

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
