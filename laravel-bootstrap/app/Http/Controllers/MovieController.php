<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\User;
use App\Models\Category;
use App\Models\Director;
use App\Http\Requests\StoreMovieRequest;
class MovieController extends Controller
{
    public function addMovieForm(){
        $categories = Category::all();
        $directors = Director::all();
        return view('addmovieform', compact('categories', 'directors'));
   
    }

    public function welcome(){
        
        return view('welcomeview');
   
    }

    public function storeMovie(StoreMovieRequest $request) {
        $user = Auth::user();
        $request->validated();
        $movie = new Movie();
        $director = Director::findOrFail($request['director']);
        $movie->title= $request['title'];
        $movie->director_id = $request['director'];
        $movie->review = $request['review'];
        $movie->date_of_publishing = $request['date_of_publishing'];
        $movie->movie_length = $request['movie_length'];
        $movie->category_id = $request['category'];
        $movie->grade = $request['grade'];
        $movie->save();
        $movie->director()->associate($director);
        $movie->save();
        return redirect('/')->with('message', 'Note created!');
    }

    public function displayMovies(){
        $movies = Movie::all();

        return view('movielist', compact('movies'));
       
    }


    public function detailMovie($id){
        // $movie = Movie::find($id);
        // $movie = Movie::with('director')->get($id);
        $movie = Movie::with('director')->findOrFail($id);
        return view('detailmovie', compact('movie'));
    }

    public function APIdetailMovie($id){
        // $movie = Movie::find($id);
        $movie = Movie::with('director')->findOrFail($id);
        return response()->json($movie);
    }

    public function APIdisplayMovies(){
        $movies = Movie::all();
        return response()->json($movies);
    }

    public function getMoviesWithCategory($category_id){
        $movies = Movie::where('category_id', $category_id)->get();
        $category = Category::findOrFail($category_id);
        return view('categorymovielist', compact('movies', 'category'));
    }

    public function APIgetMoviesWithCategory($category_id){
        $movies = Movie::where('category_id', $category_id)->get();
        return response()->json($movies);
}

public function displayMoviesbyGrade(){
    // $movies = Movie::all()->sortByDesc('grade');
    $movies = Movie::orderBy('grade', 'desc')->get();

    return view('movielistgrade', compact('movies'));
   
}

public function displayMoviesWorst(){
    // $movies = Movie::all()->sortByDesc('grade');
    $movies = Movie::orderBy('grade', 'asc')->get();

    return view('movieworst', compact('movies'));
   
}

public function displayMoviesLongsest(){
    // $movies = Movie::all()->sortByDesc('grade');
    $movies = Movie::orderBy('movie_length', 'desc')->get();

    return view('movielistlongest', compact('movies'));
   
}

public function displayMoviesShortest(){
    // $movies = Movie::all()->sortByDesc('grade');
    $movies = Movie::orderBy('movie_length', 'asc')->get();

    return view('movielistshortest', compact('movies'));
   
}

public function displayMoviesOldest(){
    // $movies = Movie::all()->sortByDesc('grade');
    $movies = Movie::orderBy('date_of_publishing', 'asc')->get();

    return view('movieoldest', compact('movies'));
   
}

public function displayMoviesNewest(){
    // $movies = Movie::all()->sortByDesc('grade');
    $movies = Movie::orderBy('date_of_publishing', 'desc')->get();

    return view('movienewest', compact('movies'));
   
}

public function APIdisplayMoviesbyGrade(){
    // $movies = Movie::all()->sortBy('grade');
    $movies = Movie::orderBy('grade', 'desc')->get();

    return response()->json($movies);
   
}

public function editMovieForm($id){
    $categories = Category::all();
    $directors = Director::all();
    $movie = Movie::findOrFail($id);
    return view('editmovieform', compact('categories', 'directors', 'movie'));

}

public function editStoreMovie(StoreMovieRequest $request, $id) {
    $user = Auth::user();
    $request->validated();
    $movie = Movie::findOrFail($id);
    $director = Director::findOrFail($request['director']);
    $movie->title= $request['title'];
    $movie->director_id = $request['director'];
    $movie->review = $request['review'];
    $movie->date_of_publishing = $request['date_of_publishing'];
    $movie->movie_length = $request['movie_length'];
    $movie->category_id = $request['category'];
    $movie->grade = $request['grade'];
    $movie->save();
    $movie->director()->associate($director);
    $movie->save();
    return redirect('/')->with('message', 'Note created!');
}

public function displayCategories(){
    $categories = Category::withCount('movies')->get();

    return view('categorylist', compact('categories'));
   
}

public function addCategoryForm(){
   
    return view('addcategoryform');

}

public function storeCategory(Request $request) {
    $user = Auth::user();
    $category = new Category();
    $category->name = $request['name'];
    $category->save();
    return redirect('/')->with('message', 'Note created!');
}

public function deleteMovie($id){
    $movie = Movie::findOrFail($id);
    $movie->delete();
    return redirect('/welcome');
}

}