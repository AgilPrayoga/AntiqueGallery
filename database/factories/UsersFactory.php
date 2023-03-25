<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username'=>'admin',
            'email'=>'ariagilprayoga@gmail.com',
            'Notelp'=>'08225095323',
            'password'=>bcrypt('123'),
            'admin'=>1
            
        ];
    }
}
