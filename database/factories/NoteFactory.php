<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return
            [
                'user_id' => 1,
                'title' => fake()->name,
                'body' => fake()->sentence,
                'send_date' => Carbon::now(),
                'heart_count' => fake()->numberBetween(1, 100)

            ];
    }
}
