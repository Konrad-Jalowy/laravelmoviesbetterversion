<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Article;
use App\Models\Answer;
use App\Events\ArticleViewed;
use App\Http\Requests\StoreArticleRequest;
use PheRum\BBCode\BBCodeParser;
class ArticleController extends Controller
{
    public function addArticleForm(){
        return view('addarticleform');
    }

    public function storeArticle(StoreArticleRequest $request) {
        $user = Auth::user();
        $validated = $request->validated();
        $article = new Article();
        $article->author = $user->name;
        $article->user_id = $user->id;
        $article->title= $request['title'];
        // $article->content = $request['content'];
        $parsedContent = htmlspecialchars($request['content']);
        $bbcode = new BBCodeParser();
        $parsedContent = $bbcode->parse($parsedContent);
        $article->content =  Str::markdown($parsedContent);
        $article->lead = $request['lead'];
        $article->save();
        return redirect('/article');
    }

    public function displayArticles(){
        $articles = Article::all();

        return view('articlelist', compact('articles'));
    }


    public function detailArticle($id){
        $article = Article::findOrFail($id);
        event(new ArticleViewed($article));
        $article->incrementViewsCount();
        return view('detailarticle', compact('article'));
    }

    public function APIdetailArticle($id){
        $article = Article::findOrFail($id);
        return response()->json($article);
    }

    public function APIdisplayArticles(){
        $articles = Article::all();
        return response()->json($articles);
    }

    public function APIdisplayUserArticles($id){
        $userArticles = Article::where('user_id', $id)->get();
        return response()->json($userArticles);
    }

    public function displayUserArticles($id){
        // $userArticles = Article::where('user_id', $id);
        $user = User::findOrFail($id);
        return view('userarticles', compact('user'));
    }


    public function showAnswerForm($id)
    {
        $this->authorize("comment-artices");
        $article = Article::findOrFail($id);
        return view('answerform', compact('article'));
    }

    public function store_answer(Request $request, $id) {
        $this->authorize("comment-artices");
        $user = Auth::user();
        $answer = new Answer();
        $answer->author = $user->name;
        $answer->content = $request['content'];
        $answer->article_id = $id;
        $answer->user_id = $user->id;
        $answer->save();
        // $article = Article::find($id);
        // $article->incrementAnswersCount();
        return redirect()->route('article.id', $id)->with('message', 'Answer added!');
    }

    public function displayArticlesByViews(){
        $articles = Article::orderBy('viewsCount', 'desc')->get();
        return view('articlelistbyviews', compact('articles'));
    }

    public function APIdisplayArticlesByViews(){
        $articles = Article::orderBy('viewsCount', 'desc')->get();
        return response()->json($articles);
    }

    public function displayArticlesByAnswers(){
        $articles = Article::orderBy('answersCount', 'desc')->get();
        return view('articlelistbyanswers', compact('articles'));
    }

    public function APIdisplayArticlesByAnswers(){
        $articles = Article::orderBy('answersCount', 'desc')->get();
        return response()->json($articles);
    }


    public function editArticleForm($id){
        $article = Article::findOrFail($id);
        return view('editarticleform', compact('article'));
    }

    public function displayArticlesByDate(){
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('articlelistbydate', compact('articles'));
    }

    public function editStoreArticle(StoreArticleRequest $request, $id) {
        $user = Auth::user();
        $request->validated();
        $article = Article::findOrFail($id);
        $article->author = $user->name;
        $article->user_id = $user->id;
        $article->title= $request['title'];
        $article->content = $request['content'];
        $article->lead = $request['lead'];
        $article->save();
        return redirect('/')->with('message', 'Note created!');
    }

    public function editAnswerForm($id, $id2)
    {
        $this->authorize("comment-artices");
        $article = Article::findOrFail($id);
        $answer = Answer::findOrFail($id2);
        return view('editanswerform', compact('article', 'answer'));
    }

    public function editStoreAnswer(Request $request, $id, $id2) {
        $this->authorize("comment-artices");
        $user = Auth::user();
        $answer = Answer::findOrFail($id2);
        $answer->author = $user->name;
        $answer->content = $request['content'];
        $answer->article_id = $id;
        $answer->user_id = $user->id;
        $answer->save();
        return redirect('/')->with('message', 'Answer succesfully created');
    }

    public function deleteArticle($id){
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('/welcome');
    }
}
