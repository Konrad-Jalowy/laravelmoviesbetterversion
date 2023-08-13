<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Answer;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Carbon;
use App\Observers\AnswerObserver;
use App\Observers\ArticleObserver;
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
        Gate::define('view-admin-stats', function (User $user) {
            return $user->is_admin === 1;
        });
        Gate::define('comment-artices', function (User $user) {
            return $user->is_active === 1;
        });
        Blade::if('yourAnswer', function (Answer $ans) {
            return $ans->user_id === Auth::id();
        });
        Blade::if('isHome', function () {
            return request()->is('/');
        });
        Blade::if('newArticle', function (Article $article) {
            // return $article->created_at === Carbon::today();
            $date = Carbon::parse($article->created_at);
            return $date->isToday() ? 1 : 0;
        });
        Answer::observe(AnswerObserver::class);
        Article::observe(ArticleObserver::class);
    }
}
