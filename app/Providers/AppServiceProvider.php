<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;    

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
        Gate::define('update', function (User $user, Post $post) {

            return $user->id === $post->user_id;
    
        });

        Gate::define('delete', function (User $user, Post $post) {

            return $user->id === $post->user_id;
    
        });
    }
}
