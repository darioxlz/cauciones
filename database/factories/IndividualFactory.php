<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Individual;
use Illuminate\Database\Eloquent\Factories\Factory;

class IndividualFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Individual::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $addresses = Address::all();

        return [
            'cedula' => $this->faker->randomNumber(8),
            'firstnames' => $this->faker->name($gender),
            'surnames' => $this->faker->lastName,
            'birthday' => $this->faker->date('Y-m-d', '-18 year'),
            'phone_number' => $this->faker->phoneNumber,
            'sex' => $gender == 'male' ? 'M': 'F',
            'address_id' => $addresses->random()->address_id,
            'created_at' => date('Y-m-d'),
            'created_by' => 1 // ID #1 is the individual/user we generate manually before run this factory
        ];
    }
}
