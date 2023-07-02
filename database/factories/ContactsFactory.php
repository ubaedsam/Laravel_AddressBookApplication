<?php

namespace Database\Factories;

use App\Models\Groups;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactsFactory extends Factory
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
            'group_id' => Groups::inRandomOrder()->first()->id,
            'name' => $this->faker->name(50),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
