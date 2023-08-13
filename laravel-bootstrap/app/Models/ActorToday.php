<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Actor;
class ActorToday extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'actor_id',
        'id'
    ];
    public function actor(){
        return $this->belongsTo(Actor::class);
    }
}
