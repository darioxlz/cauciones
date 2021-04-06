<?php

namespace Database\Factories;

use App\Models\Misdeed;
use Illuminate\Database\Eloquent\Factories\Factory;

class MisdeedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Misdeed::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(50)
        ];
    }
}
