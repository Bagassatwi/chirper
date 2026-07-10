<?php

namespace Database\Factories;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Chirp>
 */
class ChirpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?array $userIds = null;

    public function definition(): array
    {
        if (self::$userIds === null) {
            self::$userIds = User::pluck('id')->toArray();
        }
        return [
            "user_id" => fake()->randomElement(self::$userIds),
            "message" => fake("id_ID")->realText(),
        ];
    }
}
