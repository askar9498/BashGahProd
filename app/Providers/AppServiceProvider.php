<?php

namespace App\Providers;

use App\Enums\PostStatuses;
use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('panels.user.*', function ($view) {
            $latest_news = Post::whereStatus(PostStatuses::PUBLISHED)->orderBy('created_at', 'desc')->take(5)->get();
            $view->with('latest_news', $latest_news);
        });
    }
}
