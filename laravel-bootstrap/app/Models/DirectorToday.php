<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Director;

class DirectorToday extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'director_id',
        'id'
    ];

    public function director(){
        return $this->belongsTo(Director::class);
    }
}
