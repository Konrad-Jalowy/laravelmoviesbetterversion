<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Director;
use App\Models\User;
use App\Models\Movie;
use App\Http\Requests\StoreDirectorRequest;
class DirectorController extends Controller
{
    public function addDirectorForm(){
        return view('adddirectorform');
   
    }

    public function storeDirector(StoreDirectorRequest $request) {
        $user = Auth::user();
        $request->validated();
        $director = new Director();
        $director->name= $request['name'];
        $director->date_of_birth = $request['date_of_birth'];
        $director->bio = $request['bio'];
        $director->save();
        return redirect('/')->with('message', 'Note created!');
    }

    public function displayDirectors(){
        $directors = Director::all();

        return view('directorlist', compact('directors'));
       
    }


    public function detailDirector($id){
        // $director = Director::find($id);
        // $director = Director::with('movies')->withCount('movies')->findOrFail($id);
        $director = Director::WithModelAndCount(new Movie())->findOrFail($id);
        return view('detaildirector', compact('director'));
    }

    

    public function APIdetailDirector(Request $request, $id){
        // $director = Director::find($id);
        $director = Director::WithModelAndCount(new Movie())->findOrFail($id);
        // $director = Director::getDirectorAPI($request)->findOrFail($id);
        // $query = Director::findOrFail($id);
        // if($request->exists('movies'))
        // {
        //     $query::WithModelAndCount(new Movie());
        // }
        // $director = $query->get();

        $query = Director::query();
        $query->when($request->exists('movies') , function ($q) {
            return $q->with('movies')->withCount('movies');
        });
        $director = $query->findOrFail($id);
        return response()->json($director);
    }

    public function APIdisplayDirectors(){
        $directors = Director::WithModelAndCount(new Movie())->get();
        return response()->json($directors);
    }

    public function editDirectorForm($id){
        $director = Director::findOrFail($id);
        return view('editdirectorform', compact('director'));
    }

    public function editStoreDirector(StoreDirectorRequest $request, $id) {
        $user = Auth::user();
        $request->validated();
        $director = Director::findOrFail($id);
        $director->name= $request['name'];
        $director->date_of_birth = $request['date_of_birth'];
        $director->bio = $request['bio'];
        $director->save();
        return redirect('/')->with('message', 'Note created!');
    }

    public function deleteDirector($id){
        $director = Director::findOrFail($id);
        $director->delete();
        return redirect('/welcome');
    }
}
