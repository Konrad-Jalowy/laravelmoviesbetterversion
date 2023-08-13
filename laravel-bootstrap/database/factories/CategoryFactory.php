<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public static $categories = array("Horror", "Action", "Comedy", "Sci-Fi", "Fantasy", "Documentary");
  
    public function definition()
    {
        return [
            'name' => array_pop(self::$categories),
        ];
    }
}
