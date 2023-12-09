<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Review;
use App\Models\Comment;
use Illuminate\View\View;
use Illuminate\Auth\Access\Response;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update-review', function (User $user, Review $review) {
            return (($user->id === $review->user_id) 
            || ($this->isadmin($user)));
        });

        Gate::define('delete-review', function (User $user, Review $review) {
            return (($user->id === $review->user_id) 
            || ($this->isadmin($user)));
        });

        Gate::define('update-comment', function (User $user, Comment $comment) {
            return (($user->id === $comment->user_id) 
            || ($this->isadmin($user)));
        });

        Gate::define('delete-comment', function (User $user, Comment $comment) {
            return (($user->id === $comment->user_id) 
            || ($this->isadmin($user)));
        });

        Gate::define('admin', function ($user) {
            return ($user->role === 'admin')
                         ? Response::allow()
                         : Response::deny('You must be an administrator.'); 
        });
    
    }

    public function isAdmin($user): bool
    {
        return ($user->role === 3); // 1 is ID of Admin (hardcoded user) 
    }
}
