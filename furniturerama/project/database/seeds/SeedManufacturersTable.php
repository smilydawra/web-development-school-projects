<?php

use Illuminate\Database\Seeder;

class SeedManufacturersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //HTL , Pallisar, Brentwood
        DB::table('manufacturers')->insert([
            'manufacturerName' => 'HTL'
        ]);

        DB::table('manufacturers')->insert([
            'manufacturerName' => 'Pallisar'
        ]);

        DB::table('manufacturers')->insert([
            'manufacturerName' => 'Brentwood'
        ]);
    }
}
