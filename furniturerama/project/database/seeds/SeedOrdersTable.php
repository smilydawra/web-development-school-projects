<?php

use Illuminate\Database\Seeder;

class SeedOrdersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => 1,
            'shippingStreet' => 123,
            'shippingProvince' => 'chnseb',
            'shippingCity' => 'winnipeg',
            'shippingPost' => 'e33e3e3',
            'shippingCost' => 21,
            'shippingStatus' => 'pending',
            'transactionStatus'=> 'incomplete',
            'subtotal' => 23,
            'GST' => 2,
            'PST' => 2,
            'HST' => 2,
            'finalPrice' => 2334,
        ]);
         
    }
}
