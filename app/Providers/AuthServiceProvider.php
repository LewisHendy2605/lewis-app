<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Review;
use App\Models\Comment;


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
    
    }

    public function isAdmin($user): bool
    {
        return ($user->id === 3); // 1 is ID of Admin (hardcoded user) 
    }
}
