<?php

namespace Database\Factories;

use App\Models\Caution;
use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CautionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Caution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $files = File::all();
        $users = User::all();

        return [
            'file_id' => $files->random()->file_id,
            'image_path' => 'test',
            'created_at' => date('Y-m-d'),
            'created_by' => $users->random()->user_id
        ];
    }
}
