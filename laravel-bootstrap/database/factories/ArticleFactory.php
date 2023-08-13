<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
   
    public function definition() 
    {
        $user = User::all()->random();
        return [
            'lead' => fake()->paragraph(3),
            'content' => fake()->paragraph(10),
            'title' => fake()->words(5, true),
            'author' => $user->name,
            "user_id" => $user->id,
            "views" => random_int(0,100)
        ];
    }
}
