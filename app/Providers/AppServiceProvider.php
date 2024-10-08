<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification; 
use Carbon\Carbon;
use Sentry\SentrySdk;
use Sentry\State\Scope;


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

        //For sending issues to Email
        // SentrySdk::getCurrentHub()->configureScope(function (Scope $scope) {
        //     // Check if a route is defined before attempting to get its name
        //     if ($route = request()->route()) {
        //         $scope->setTransactionName($route->getName());
        //     }
        // });

      
    }


}
