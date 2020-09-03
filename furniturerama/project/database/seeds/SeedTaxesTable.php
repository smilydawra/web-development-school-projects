<?php

use Illuminate\Database\Seeder;

class SeedTaxesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxes')->insert([
            'province' => 'Alberta',
            'GST' => 0.05
        ]);
        DB::table('taxes')->insert([
            'province' => 'British Columbia',
            'GST' => 0.05,
            'PST' => 0.07
        ]);
        DB::table('taxes')->insert([
            'province' => 'Manitoba',
            'GST' => 0.05,
            'PST' => 0.07
        ]);
        DB::table('taxes')->insert([
            'province' => 'New Brunswick',
            'HST' => 0.15
        ]);
        DB::table('taxes')->insert([
            'province' => 'Newfoundland and Labrador',
            'HST' => 0.15
        ]);
        DB::table('taxes')->insert([
            'province' => 'Northwest Territories',
            'GST' => 0.05
        ]);
        DB::table('taxes')->insert([
            'province' => 'Nova Scotia',
            'HST' => 0.15
        ]);
        DB::table('taxes')->insert([
            'province' => 'Nunavut',
            'GST' => 0.05
        ]);
        DB::table('taxes')->insert([
            'province' => 'Ontario',
            'HST' => 0.13
        ]);
        DB::table('taxes')->insert([
            'province' => 'Prince Edward Island',
            'HST' => 0.15
        ]);
        DB::table('taxes')->insert([
            'province' => 'Quebec',
            'GST' => 0.05,
            'PST' => 0.10
        ]);
        DB::table('taxes')->insert([
            'province' => 'Saskatchewan',
            'GST' => 0.05,
            'PST' => 0.06
        ]);
        DB::table('taxes')->insert([
            'province' => 'Yukon',
            'GST' => 0.05
        ]);
        
    }
}

