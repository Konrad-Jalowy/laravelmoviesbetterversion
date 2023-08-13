<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DelayedArticle;
use App\Http\Requests\StoreDelayedArticle;
class DelayedArticleController extends Controller
{
    public function addDelayedArticleForm(){
        return view('adddelayedarticeform');
    }

    public function storeArticle(StoreDelayedArticle $request) {
        $user = Auth::user();
        $validated = $request->validated();
        $article = new DelayedArticle();
        $article->author = $user->name;
        $article->user_id = $user->id;
        $article->title= $request['title'];
        $article->content = $request['content'];
        $article->lead = $request['lead'];
        $article->publish_date = $request['publish_date'];
        $article->save();
        return redirect('/article');
    }

    public function displayArticles(){
        $articles = DelayedArticle::all();

        return view('delayedarticlelist', compact('articles'));
    }


    public function detailArticle($id){
        $article = DelayedArticle::findOrFail($id);
        return view('detaildelayedarticle', compact('article'));
    }



    public function editArticleForm($id){
        $article = DelayedArticle::findOrFail($id);
        return view('editdelayedarticleform', compact('article'));
    }

    public function editStoreArticle(StoreDelayedArticle $request, $id) {
        $user = Auth::user();
        $request->validated();
        $article = DelayedArticle::findOrFail($id);
        $article->author = $user->name;
        $article->user_id = $user->id;
        $article->title= $request['title'];
        $article->content = $request['content'];
        $article->lead = $request['lead'];
        $article->publish_date = $request['publish_date'];
        $article->save();
        return redirect('/')->with('message', 'Note created!');
    }

    public function deleteArticle($id){
        $article = DelayedArticle::findOrFail($id);
        $article->delete();
        return redirect('/welcome');
    }
}
