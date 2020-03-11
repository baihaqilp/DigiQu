<?php

use Illuminate\Database\Seeder;

class KitabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Kitabs::class,10)->create();
    }
}
