<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name' => 'Catedral',
            'address' => 'Catedral 1401, Santiago',
        ]);
        Location::create([
            'name' => 'Renca',
            'address' => 'Pdte Eduardo Frei Montalva 3092'
        ]);
        Location::create([
            'name' => 'Maipu',
            'address' => 'Av. Pajaritos 4444, Maipú'
        ]);
    }
}
