<?php

use Illuminate\Database\Seeder;
use App\Models\Taxi;

class TaxisSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0;$i<1000;$i++){
            Taxi::create([
                'departure' =>$faker->dateTime,
                'arrival' => $faker->dateTime,
                
            ])
        }
    }
}
