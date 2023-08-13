<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function article() {
        return $this->belongsTo(Article::class);
    }

    // public function incrementViewsCount(){
    //     $this->viewsCount++;
    //     return $this->save();
    // }
    // public function incrementAnswersCount(){
    //     $this->answersCount++;
    //     return $this->save();
    // }

    public function scopeIsToday(Builder $query) 
    {
        $query->whereDate('created_at', Carbon::today());
    }
}
