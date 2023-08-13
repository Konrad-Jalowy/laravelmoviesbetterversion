<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DelayedArticleController;
use App\Models\Director;
use App\Http\Middleware\CheckExistenceMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/movie');
});

Route::get('/app', function(){
    return view('app2');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('movie')->group(function(){
    
    Route::get("/add", [MovieController::class, 'addMovieForm'])->name('movie.add');
    Route::post("/add", [MovieController::class, 'storeMovie'])->name('movie.store');
    Route::get("/{id}", [MovieController::class, 'detailMovie'])->whereNumber('id')->name('movie.detail');
    Route::get("/{id}/edit", [MovieController::class, 'editMovieForm'])->whereNumber('id')->name('movie.edit');
    Route::post("/{id}/edit", [MovieController::class, 'editStoreMovie'])->whereNumber('id')->name('movie.editStore');
    Route::delete("/{id}", [MovieController::class, 'deleteMovie'])->whereNumber('id');
    Route::get("/bygrade", [MovieController::class, 'displayMoviesByGrade'])->name('movie.best');
    Route::get("/worst", [MovieController::class, 'displayMoviesWorst'])->name('movie.worst');
    Route::get("/longest", [MovieController::class, 'displayMoviesLongsest'])->name('movie.longest');
    Route::get("/shortest", [MovieController::class, 'displayMoviesShortest'])->name('movie.shortest');
    Route::get("/oldest", [MovieController::class, 'displayMoviesOldest'])->name('movie.oldest');
    Route::get("/newest", [MovieController::class, 'displayMoviesNewest'])->name('movie.newest');
    Route::get("/", [MovieController::class, 'displayMovies'])->name('movielist');
    

});
Route::get("/welcome", [MovieController::class, 'welcome'])->name('welcome');
Route::prefix('article')->group(function(){

    Route::get('/{id}', [ArticleController::class, 'detailArticle'])
    ->name('article.id');
    // ->middleware(CheckExistenceMiddleware::class.':Article');
    Route::get("/{id}/addcomment", [ArticleController::class, 'showAnswerForm'])->name('article.comment');
    Route::post("/{id}/addcomment", [ArticleController::class, 'store_answer'])->name('article.storeComment');
    Route::get("/{id}/addcomment/{id2}/edit", [ArticleController::class, 'editAnswerForm'])->name('article.editComment');
    Route::post("/{id}/addcomment/{id2}/edit", [ArticleController::class, 'editStoreAnswer'])->name('answer.storeEdit');
    Route::get("/add", [ArticleController::class, 'addArticleForm'])->name('article.add');
    Route::post("/add", [ArticleController::class, 'storeArticle'])->name('article.store');
    Route::get("/{id}/edit", [ArticleController::class, 'editArticleForm'])->name('article.edit-form');
    Route::post("/{id}/edit", [ArticleController::class, 'editStoreArticle'])->name('article.editStore');
    Route::delete("/{id}/delete", [ArticleController::class, 'deleteArticle']);
    Route::get('/byuser/{id}', [ArticleController::class, 'displayUserArticles']);
    Route::get("/byviews", [ArticleController::class, 'displayArticlesByViews'])->name('article.byviews');
    Route::get("/byanswers", [ArticleController::class, 'displayArticlesByAnswers'])->name('article.byanswers');
    Route::get("/bydate", [ArticleController::class, 'displayArticlesByDate'])->name('article.bydate');
    Route::get("/", [ArticleController::class, 'displayArticles'])->name('articlelist');
    

    Route::prefix('delayed')->name('delayed.')->group(function() {
        Route::get("/", [DelayedArticleController::class, 'displayArticles'])->name('list');
        Route::get('/add', [DelayedArticleController::class, 'addDelayedArticleForm'])->name('add');
        Route::post('/add', [DelayedArticleController::class, 'storeArticle'])->name('store');
        Route::get('/{id}', [DelayedArticleController::class, 'detailArticle']);
        Route::get('/{id}/edit', [DelayedArticleController::class, 'editArticleForm']);
        Route::post('/{id}/edit', [DelayedArticleController::class, 'editStoreArticle']);
        Route::delete('/{id}/delete', [DelayedArticleController::class, 'deleteArticle']);
    });
});

// Route::prefix('admin')->group(function(){
//     Route::get("/users", function(){
//         return "users list";
//     });
//     Route::get("/stats", [StatsController::class, 'generalStats'] )->name('stats');
// });

Route::prefix('actor')->group(function(){
    
    
    Route::get("/add", [ActorController::class, 'addActorForm'])->name('actor.add');
    Route::post("/add", [ActorController::class, 'storeActor'])->name('actor.store');
    Route::get("/{id}", [ActorController::class, 'detailActor'])->whereNumber('id')->name('actor.detail');
    Route::get("/{id}/edit", [ActorController::class, 'editActorForm'])->whereNumber('id')->name('actor.edit');
    Route::post("/{id}/edit", [ActorController::class, 'editStoreActor'])->whereNumber('id')->name('actor.editStore');
    Route::delete("/{id}", [ActorController::class, 'deleteActor'])->whereNumber('id');
    Route::get("/", [ActorController::class, 'displayActors'])->name('actorlist');

});

Route::prefix('director')->group(function(){
    Route::get("/add", [DirectorController::class, 'addDirectorForm'])->name('director.add');
    Route::post("/add", [DirectorController::class, 'storeDirector'])->name('director.store');
    Route::get("/{id}", [DirectorController::class, 'detailDirector'])->whereNumber('id')->name('director.detail');
    Route::get("/{id}/edit", [DirectorController::class, 'editDirectorForm'])->whereNumber('id');
    Route::post("/{id}/edit", [DirectorController::class, 'editStoreDirector'])->whereNumber('id')->name('director.editStore');
    Route::delete("/{id}", [DirectorController::class, 'deleteDirector'])->whereNumber('id');
    Route::get("/", [DirectorController::class, 'displayDirectors'])->name('directorlist');

});

Route::prefix('category')->group(function(){
    Route::get("/", [MovieController::class, 'displayCategories'])->name('categorylist');
    Route::get("/add", [MovieController::class, 'addCategoryForm'])->name('category.add');
    Route::post("/add", [MovieController::class, 'storeCategory'])->name('category.store');
    Route::get("/{id}", [MovieController::class, 'getMoviesWithCategory'])->name('category.movies');
});




Route::fallback(function(){
    return "Page not found";
});