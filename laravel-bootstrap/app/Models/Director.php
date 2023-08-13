<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
class Director extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date_of_birth',
        'bio'
    ];

    public function movies() {
        return $this->hasMany(Movie::class);
    }

    public function scopeWithModelAndCount(Builder $query, Model $attachedModel){
        $query->with($attachedModel->getTable())->withCount($attachedModel->getTable());
    }

    // public static function getDirectorAPI(Request $request)
    // {
    //     return Director::where(function(Builder $query) use ($request) {

            
    //         if($request->exists('movies'))
    //         {
    //             $query::WithModelAndCount(new Movie());
    //         }
    //         else
    //         {
    //             $query;
    //         }
    //     });
    // }
}
