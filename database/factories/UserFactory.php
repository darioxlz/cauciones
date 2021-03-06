<?php

namespace Database\Factories;

use App\Models\Individual;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $individuals = Individual::all();

        return [
            'individual_id' => $individuals->random()->individual_id,
            'password' => '12345678',
            'permissions' => 'test'
        ];
    }
}
