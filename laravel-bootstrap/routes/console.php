<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use App\Models\Answer;
use App\Models\CategoryToday;
use App\Models\Director;
use App\Models\DirectorToday;
use App\Models\Actor;
use App\Models\ActorToday;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('add-role {--role} {--id}', function($role, $id){
    $roles = array("admin", "moderator", "reviever");
    if($this->option('role')){
        if(in_array($this->option('role'), $roles)){
            if($this->option('id')){
            $user = User::find($this->option('id'));
            switch ($this->option('role')) {
                case 'admin':
                    $user->is_admin = 1;
                    break;
                case 'moderator':
                    $user->is_moderator = 1;
                    break;
                case 'reviever':
                    $user->is_reviever = 1;
                    break;
                default:
                    break;
            }
            $user->save();
            }
            else{
                $this->comment('ID not specified!');
            }
        }
        else{
            $this->comment('Unknown role!');
        }
        
    }
    else{
        $this->comment('Role not specified!');
    }
});


Artisan::command('create-superuser {id}', function ($id) {
    $user = User::find($id);
    $user->is_admin = 1;
    $user->save();
    $adminsCount = User::where('is_admin', 1)->count();
    $this->comment("User with id $id is now admin");
    $this->comment("Number of admins: $adminsCount");
})->purpose('Create superuser');

Artisan::command('degrade-superuser {id}', function ($id) {
    $user = User::find($id);
    $user->is_admin = 0;
    $user->save();
    $adminsCount = User::where('is_admin', 1)->count();
    $this->comment("User with id $id is not an admin anymore");
    $this->comment("Number of admins: $adminsCount");
})->purpose('Create superuser');

Artisan::command('activate-user {id}', function($id){
    $user = User::find($id);
    $user->is_active = 1;
    $user->save();
    $this->comment("User with id $id has been activated");
});

Artisan::command('deactivate-user {id}', function($id){
    $user = User::find($id);
    $user->is_active = 0;
    $user->save();
    $this->comment("User with id $id has been deactivated");
});

Artisan::command('stats', function(){
    $usersCount = User::all()->count();
    // $activeUsersCount = User::where('is_active', 1)->count();
    $activeUsersCount = User::hasRole('active')->get()->count();
    $notActiveCount = $usersCount - $activeUsersCount;
    // $adminsCount = User::where('is_admin', 1)->count();
    $adminsCount = User::hasRole('admin')->get()->count();
    // $moderatorsCount = User::where('is_moderator', 1)->count();
    $moderatorsCount =  User::hasRole('admin')->get()->count();
    // $revieversCount = User::where('is_reviever', 1)->count();
    $revieversCount =  User::hasRole('reviever')->get()->count();
    $this->comment("Number of users: $usersCount");
    $this->comment("Number of active users: $activeUsersCount");
    $this->comment("Number of not activated users: $notActiveCount");
    $this->comment("Number of admins: $adminsCount");
    $this->comment("Number of moderators: $moderatorsCount");
    $this->comment("Number of revievers: $revieversCount");
});


Artisan::command('create-category {name}', function($name){
    $name = ucfirst($name);
    $category = new Category();
    $category->name = $name;
    $category->save();
    $this->comment("Category $name has been created");
});

Artisan::command('capitalize-category {id}', function($id){
    $category = Category::find($id);
    $name = ucfirst($category->name);
    $category->name = $name;
    $category->save();
    $this->comment("Category $name has been capitalized");
});

Artisan::command('show-categories', function(){
    $categories = Category::all();
    $count = $categories->count();
    $this->comment("Number of categories: $count");
    foreach($categories as $category){
        $this->comment($category->name);
    }
});

Artisan::command('create-moderator {id}', function ($id) {
    $user = User::find($id);
    $user->is_moderator = 1;
    $user->save();
    $moderatorsCount = User::where('is_moderator', 1)->count();
    $this->comment("User with id $id is now moderator");
    $this->comment("Number of admins: $moderatorsCount");
})->purpose('Create superuser');

Artisan::command('degrade-moderator {id}', function ($id) {
    $user = User::find($id);
    $user->is_moderator = 0;
    $user->save();
    $moderatorsCount = User::where('is_moderator', 1)->count();
    $this->comment("User with id $id is not a moderator anymore");
    $this->comment("Number of admins: $moderatorsCount");
})->purpose('Create superuser');

Artisan::command('create-reviever {id}', function ($id) {
    $user = User::find($id);
    $user->is_reviever = 1;
    $user->save();
    $revieversCount = User::where('is_reviever', 1)->count();
    $this->comment("User with id $id is now reviever");
    $this->comment("Number of admins: $revieversCount");
})->purpose('Create superuser');

Artisan::command('degrade-reviever {id}', function ($id) {
    $user = User::find($id);
    $user->is_reviever = 0;
    $user->save();
    $revieversCount = User::where('is_reviever', 1)->count();
    $this->comment("User with id $id is not a reviever anymore");
    $this->comment("Number of admins: $revieversCount");
})->purpose('Create superuser');

Artisan::command('grant-all-privlidges {id}', function ($id) {
    $user = User::find($id);
    $user->is_admin = 1;
    $user->is_active = 1;
    $user->is_moderator = 1;
    $user->is_reviever = 1;
    $user->save();
    $this->comment("User with id $id has been granted all priviledges");
})->purpose('Create superuser');

Artisan::command('remove-all-privlidges {id}', function ($id) {
    $user = User::find($id);
    $user->is_admin = 0;
    $user->is_active = 0;
    $user->is_moderator = 0;
    $user->is_reviever = 0;
    $user->save();
    $this->comment("User with id $id has lost all priviledges");
})->purpose('Create superuser');


Artisan::command('stats-article', function(){
    $articleCount = Article::all()->count();
    $neverSeen = Article::neverSeen()->get()->count();
    $seen = Article::Seen()->get()->count();
    $notAnswered = Article::NeverAnswered()->get()->count();
    $answered = Article::Answered()->get()->count();

    $this->comment("Number of articles: $articleCount");
    $this->comment("Never seen articles: $neverSeen");
    $this->comment("Seen articles: $seen");
    $this->comment("Never answered articles: $notAnswered");
    $this->comment("Answered articles: $answered");

});

Artisan::command('drop-db', function(){
    try {
            $dbc = new PDO('mysql:host=localhost;port=3307;name='.env('DB_DATABASE').';', env('DB_USERNAME'), env('DB_PASSWORD'));
            $query = "DROP DATABASE ". env('DB_DATABASE').";";
            $dbc->exec($query);
            $this->comment("Database has been dropped");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
});

Artisan::command('create-db', function(){
    try {
        $dbc = new PDO('mysql:host=localhost;port=3307;name='.env('DB_DATABASE').';', env('DB_USERNAME'), env('DB_PASSWORD'));
        $charset = config('database.connections.mysql.charset');
        $collation = config('database.connections.mysql.collation');
        $query = "CREATE DATABASE IF NOT EXISTS ". env('DB_DATABASE') . " CHARACTER SET $charset COLLATE $collation;";
        $dbc->exec($query);
        $this->comment("Database has been created");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});

// Artisan::command('seed-comment {user=1} {article=1}', function(){
 
//     $answer = new Answer();
//     $user = User::find($this->option('user'));
//     $article = Article::find($this->option('article'));
//     $answer->content =  fake()->paragraph(2);
//     $answer->author = $user->name;

//     $this->comment("Database has been dropped");
        
// });


// return [
//     'content' => fake()->paragraph(2),
//     'author' => $user->name,
//     'user_id' => $user->id,
//     'article_id' => $article->id

// ];


Artisan::command('category-today', function () {
    $category = Category::inRandomOrder()->first();
    $categoryToday = CategoryToday::updateOrCreate(
        ['id' => 1],
        ['name' => $category->name, 'category_id' => $category->id, 'id' => 1]
    );
    $this->comment($categoryToday->name);
})->purpose('Create superuser');

Artisan::command('director-today', function () {
    $director = Director::inRandomOrder()->first();
    $directorToday = DirectorToday::updateOrCreate(
        ['id' => 1],
        ['name' => $director->name, 'director_id' => $director->id, 'id' => 1]
    );
    $this->comment($directorToday->name);
})->purpose('Create superuser');

Artisan::command('actor-today', function () {
    $actor = Actor::inRandomOrder()->first();
    $actorToday = ActorToday::updateOrCreate(
        ['id' => 1],
        ['name' => $actor->name, 'actor_id' => $actor->id, 'id' => 1]
    );
    $this->comment($actorToday->name);
})->purpose('Create superuser');

Artisan::command('generate-fake-views', function () {
    $articles = Article::all();
    $articles->each(function($article){
        if($article::neverSeen() === 1){
            $article->viewsCount = 1;
        }
        else
        {
            if($article::viewsBetween(1,10) === 1)
            {
                $article->viewsCount += random_int(1,5);
            }
            elseif($article::viewsBetween(10,30) === 1)
            {
                $article->viewsCount += random_int(10,20);
            }
            elseif($article::viewsBetween(30,50) === 1)
            {
                $article->viewsCount += random_int(20,40);
            }
            elseif($article::viewsBetween(50, 100) === 1)
            {
                $article->viewsCount += random_int(40,60);
            }
            elseif($article::viewsBetween(100, 1000) === 1)
            {
                $article->viewsCount += random_int(60,160);
            }
            else
            {
                $article->viewsCount += random_int(1,15);
            }
        }
    $article->save();
    });
    $this->comment("Fake views generated");
})->purpose('Create superuser');


// Artisan::command('blade-count', function () {
//     // $number = count(glob('*.php'));
//     foreach (glob("*.php") as $filename) {
//         $this->comment("$filename size " . filesize($filename));
//     }
//     // $this->comment("Number of blade files: $number");
// })->purpose('Display an inspiring quote');