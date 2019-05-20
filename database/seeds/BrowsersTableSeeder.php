<?php

use Illuminate\Database\Seeder;
use App\Models\Browser;

class BrowsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Browser::class, 5)->create();
    }
}
