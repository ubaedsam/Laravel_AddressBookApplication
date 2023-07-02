<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'user_id' => User::inRandomOrder()->first()->id,
            'user_id' => 8,
            'group' => $this->faker->text(15),
        ];
    }
}
