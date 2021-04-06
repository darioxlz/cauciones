<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Individual;
use App\Models\Misdeed;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $individual = Individual::doesntHave('user')->get();
        $misdeed = Misdeed::all();
        $users = User::all();

        return [
            'individual_id' => $individual->random()->individual_id,
            'misdeed_id' => $misdeed->random()->misdeed_id,
            'description' => $this->faker->text(50),
            'created_at' => date('Y-m-d'),
            'created_by' => $users->random()->user_id
        ];
    }
}
