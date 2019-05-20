<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

/**
 * Class CountriesTableSeeder
 */
class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class, 20)->create();
    }
}
