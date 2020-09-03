<?php

use Illuminate\Database\Seeder;

class SeedCategoriesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //categories : sofa, sofabed, table, markdown, 
         DB::table('categories')->insert([
            'categoryName' => 'Sofa'
        ]);

         DB::table('categories')->insert([
            'categoryName' => 'Chair'
        ]);

         DB::table('categories')->insert([
            'categoryName' => 'Table'
        ]);

         DB::table('categories')->insert([
            'categoryName' => 'MarkDown'
        ]);
    }
}
