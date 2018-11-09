<?php

use Illuminate\Database\Seeder;
use App\Models\Time;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Time::create([
            'location_from_id' => 1,
            'location_to_id' => 2,
            'travel_time' => '00:45:00'
        ]);
        Time::create([
            'location_from_id' => 1,
            'location_to_id' => 3,
            'travel_time' => '00:45:00'
        ]);
        Time::create([
            'location_from_id' => 2,
            'location_to_id' => 3,
            'travel_time' => '01:15:00'
        ]);
    }
}
