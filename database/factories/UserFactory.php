<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => 'Nadia',
            'email' => 'bnbbax@gmail.com',
            'email_verified_at' => now(),
            'password' => 'nadiaaaa',
            'avatar' => 'avatar.png',
            'no_telp' => 'Belum ada nomor telepon',
            // 'remember_token' => null,
            // 'created_at'=> '2024-05-26 14:06:18',
            // 'updated_at' => '2024-05-26 14:07:58',
            'role' => 'admin',
            // 'google2fa_secret' => null
        ];
    }
}