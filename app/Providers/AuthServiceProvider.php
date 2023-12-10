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
            || ($this->isAdmin($user)));
        });

        Gate::define('delete-review', function (User $user, Review $review) {
            return (($user->id === $review->user_id) 
            || ($this->isModerator($user)));
        });

        Gate::define('update-comment', function (User $user, Comment $comment) {
            return (($user->id === $comment->user_id) 
            || ($this->isAdmin($user)));
        });

        Gate::define('delete-comment', function (User $user, Comment $comment) {
            return (($user->id === $comment->user_id) 
            || ($this->isModerator($user)));
        });

        Gate::define('admin', function ($user) {
            return ($user->role === 'admin')
                         ? Response::allow()
                         : Response::deny('You must be an administrator.'); 
        });

        Gate::define('moderator', function ($user) {
            return (($user->role === 'moderator') || ($user->role === 'admin'))
                         ? Response::allow()
                         : Response::deny('You must be an moderator.'); 
        });
    
    }

    public function isAdmin($user): bool
    {
        return ($user->role === 'admin');  
    }

    public function isModerator($user): bool
    {
        return (($user->role === 'moderator') || $this->isAdmin($user));  
    }
}
