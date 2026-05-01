<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Cost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cost>
 */
class CostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       => User::factory(),
            'category_id'   => Category::factory(),
            'title'         => $this->faker->title(),
            'price'         => $this->faker->numberBetween(100, 999_999_999),
            'spent_at'      => $this->faker->date('j F,Y'),
            'note'          => null,
        ];
    }



    public function withNote(string $note): static
    {
        return $this->state(['note' => $note]);
    }
}
