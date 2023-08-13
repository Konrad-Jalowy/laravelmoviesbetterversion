<?php

namespace App\Observers;

use App\Models\Answer;
use App\Models\Article;
use App\Models\User;

class AnswerObserver
{
    /**
     * Handle the Answer "created" event.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function created(Answer $answer)
    {
        $article = Article::find($answer->article_id);
        $article->incrementAnswersCount();
        $user = User::find($answer->user_id);
        $user->incrementAnswersCount();
    }

    /**
     * Handle the Answer "updated" event.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function updated(Answer $answer)
    {
        //
    }

    /**
     * Handle the Answer "deleted" event.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function deleted(Answer $answer)
    {
        $article = Article::find($answer->article_id);
        $article->decrementAnswersCount();
        $user = User::find($answer->user_id);
        $user->decrementAnswersCount();
    }

    /**
     * Handle the Answer "restored" event.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function restored(Answer $answer)
    {
        //
    }

    /**
     * Handle the Answer "force deleted" event.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function forceDeleted(Answer $answer)
    {
        $article = Article::find($answer->article_id);
        $article->decrementAnswersCount();
        $user = User::find($answer->user_id);
        $user->decrementAnswersCount();
    }
}
