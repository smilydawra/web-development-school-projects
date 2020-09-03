<?php

use Illuminate\Database\Seeder;

class SeedPromotionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            'promotionCode' => 'Jyoti50',
            'promotionAmount' => 50
        ]);
        DB::table('promotions')->insert([
            'promotionCode' => 'Mykyta70',
            'promotionAmount' => 70
        ]);
    }
}
