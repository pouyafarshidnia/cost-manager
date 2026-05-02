<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Cost;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     * 
     * Main user with 5 categories and 8 costs
     * 
     * Other user with 2 categories and 6 costs
     * 
     * A user with n category and no cost
     */
    public function run(): void
    {

        $user =  User::factory()->create();
        $category = Category::factory()->for($user)->create();

        $otherUser =  User::factory()->create();
        $otherCategory = Category::factory()->for($otherUser)->create();

        User::factory()->create();

        Cost::factory()->for($user)->for($category)->create();
        Cost::factory()->for($otherUser)->for($otherCategory)->create();

        Category::factory()->for($user)->count(4)->create();
        Cost::factory()->for($user)->for($category)->count(7)->create();

        Category::factory()->for($otherUser)->count(2)->create();
        Cost::factory()->for($otherUser)->for($otherCategory)->count(5)->create();
    }
}
