<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_moderator',
        'is_reviever',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function delayedArticles(){
        return $this->hasMany(DelayedArticle::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function scopeHasRole(Builder $query, $role)
    {
        $query->where("is_$role", 1);
    }

    public function scopeHasNotRole(Builder $query, $role)
    {
        $query->where("is_$role", 0);
    }

    public function incrementAnswersCount(){
        $this->answersCount++;
        return $this->save();
    }

    public function decrementAnswersCount(){
        $this->answersCount--;
        return $this->save();
    }

    public function incrementArticlesCount(){
        $this->articlesCount++;
        return $this->save();
    }

    public function decrementArticlesCount(){
        $this->articlesCount--;
        return $this->save();
    }
}
