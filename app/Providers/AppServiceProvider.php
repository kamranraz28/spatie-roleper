<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification; 
use Carbon\Carbon;

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
        // Sharing notifications with all views
        View::composer('*', function ($view) {
            // Get all notifications
            $notifications = Notification::where('notifiable_id', 0)
                 ->orderBy('created_at', 'desc')
                ->take(10) // Limit to last 5 notifications
                ->get();

            // Share the notifications with all views
            $view->with('notifications', $notifications);
        });
    }
}
