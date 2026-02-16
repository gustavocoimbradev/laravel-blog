<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthorFactory extends Factory
{
 
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'bio' => fake()->words(3, true)
        ];
    }
}
