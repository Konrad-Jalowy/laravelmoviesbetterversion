<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelayedArticle extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'lead',
        'publish_date'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
