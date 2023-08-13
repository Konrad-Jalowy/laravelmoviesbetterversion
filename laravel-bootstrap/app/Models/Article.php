<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'lead'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function incrementViewsCount(){
        $this->viewsCount++;
        return $this->save();
    }

    public function incrementAnswersCount(){
        $this->answersCount++;
        return $this->save();
    }

    public function decrementAnswersCount(){
        $this->answersCount--;
        return $this->save();
    }

    public function scopeNeverSeen(Builder $query)
    {
        $query->where('viewsCount', 0);
    }
    
    public function scopeSeen(Builder $query)
    {
        $query->where('viewsCount', ">", 0);
    }

    public function scopeNeverAnswered(Builder $query)
    {
        $query->where('answersCount', 0);
    }
    
    public function scopeAnswered(Builder $query)
    {
        $query->where('answersCount', ">", 0);
    }

    public function scopeViewsBetween(Builder $query, $from, $to)
    {
        $query->where('viewsCount', '>=', $from)->where('viewsCount', '<=', $to);
    }

    public function scopeAnswersBetween(Builder $query, $from, $to)
    {
        $query->where('answersCount', '>=', $from)->where('answersCount', '<=', $to);
    }

    public function scopeIsToday(Builder $query) 
    {
        $query->whereDate('created_at', Carbon::today());
    }


    
}
