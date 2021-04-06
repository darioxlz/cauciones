<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Caution;
use App\Models\File;
use App\Models\Individual;
use App\Models\Misdeed;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $path = base_path() . '/database/seeders/StatesMunicipalitiesCities.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        Address::factory()->count(30)->create();

        // create admin user
        Individual::factory()->create([
            'cedula' => '28462837',
            'firstnames' => 'Jose Jesus',
            'surnames' => 'Padron Figueroa',
            'birthday' => '1999-10-14',
            'phone_number' => '04249876543',
            'sex' => 'M'
        ]);
        User::factory()->create([
            'individual_id' => 1
        ]);

        Misdeed::factory()->count(10)->create();
        Individual::factory()->count(19)->create();
        User::factory()->count(4)->create();
        File::factory()->count(10)->create();
        Caution::factory()->count(5)->create();
    }
}
