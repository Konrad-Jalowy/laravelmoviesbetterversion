<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\SaveIPMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(){
    $resp = array("Available API routes" => array(
        "/article",
        "/user",
        "/actor",
        "/director",
        "/movie"
    ));
    return response()->json($resp);
})->middleware(SaveIPMiddleware::class);
Route::prefix('article')->group(function(){

    Route::get("/", [ArticleController::class, 'APIdisplayArticles'])->name('apiarticles');
    
    Route::get("/{id}", [ArticleController::class, 'APIdetailArticle'])->whereNumber('id')->name('api.detail.article');

    Route::get('/byuser/{id}', [ArticleController::class, 'APIdisplayUserArticles']);
    Route::get('/byviews', [ArticleController::class, 'APIdisplayArticlesByViews']);
    Route::get('/byanswers', [ArticleController::class, 'APIdisplayArticlesByAnswers']);
});

Route::prefix('user')->group(function(){
    Route::get("/", function(){
        $users = User::all();
        return response()->json($users);
    });
    Route::get("/active", function(){
        $activeUsers = User::where('is_active', 1)->get();
        return response()->json($activeUsers);
    });
    Route::get("/notactive", function(){
        $inactiveUsers = User::where('is_active', 0)->get();
        return response()->json($inactiveUsers);
    });
    Route::get("/admin", function(){
        $admins = User::all()->reject(function (User $user) {
            return $user->is_admin === 0;
        })->map(function (User $user) {
            return $user->name;
        });
        return response()->json($admins);
    });

});


Route::prefix('actor')->group(function(){
    Route::get("/", [ActorController::class, 'APIdisplayActors'])->name('apiactors');
    Route::get("/{id}", [ActorController::class, 'APIdetailActor'])->name('apiactor');

});

Route::prefix('director')->group(function(){
    // Route::get("/", function(){
    //     return "directors list";
    // });
    // Route::get("/{id}", function($id){
    //     return "director by $id";
    // });
    Route::get("/", [DirectorController::class, 'APIdisplayDirectors'])->name('apidirectors');
    Route::get("/{id}", [DirectorController::class, 'APIdetailDirector'])->name('apidirector');
    

});

Route::prefix('movie')->group(function(){
    // Route::get("/", function(){
    //     return "movies list";
    // });
    // Route::get("/{id}", function($id){
    //     return "movie by $id";
    // });
    Route::get("/", [MovieController::class, 'APIdisplayMovies'])->name('apimovies');
    Route::get("/{id}", [MovieController::class, 'APIdetailMovie'])->whereNumber('id')->name('apimovie');
    Route::get('/bycategory/{id}', [MovieController::class, 'APIgetMoviesWithCategory']);
    Route::get('/bygrade', [MovieController::class, 'APIdisplayMoviesbyGrade']);
    
         
});