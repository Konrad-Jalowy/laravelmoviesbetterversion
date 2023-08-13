<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'review',
        'movie_length',
        'date_of_publishing',
        'grade',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function director(){
        return $this->belongsTo(Director::class);
    }
}
