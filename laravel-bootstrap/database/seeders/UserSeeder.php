<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->admin()
            ->count(2)
            ->create();
            User::factory()
            ->moderator()
            ->count(3)
            ->create();
            User::factory()
            ->reviever()
            ->count(4)
            ->create();
            User::factory()
            ->active()
            ->count(5)
            ->create();
            User::factory()
            ->count(10)
            ->create();
    }
}
