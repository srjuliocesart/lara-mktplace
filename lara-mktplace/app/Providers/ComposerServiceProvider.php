<?php

namespace App\Providers;

use App\Http\Views\CategoryViewComposer;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*',CategoryViewComposer::class);
    }
}
