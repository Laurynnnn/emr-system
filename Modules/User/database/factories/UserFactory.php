<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->fake()->name,
            'email' => $this->fake()->unique()->safeEmail,
            'username' => $this->fake()->unique()->userName,
            'role' => 'admin', // Default role is 'admin'
            'password' => Hash::make('password'), // Default password
        ];
    }
}
