<?php

use Illuminate\Database\Seeder;

class SeedMaterialsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //leather, fabric, microsuade, leather gel, polyester, Velvet , chenille, nylon, hardwood, rubberwoord, solidwood , veeners 
        //
        DB::table('materials')->insert([
            'materialName' => 'Leather'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Fabric'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Microsuade'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Leather Gel'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Polyster'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Velvet'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Chenille'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Nylon'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Hardwood'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Solid Wood'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Rubberwood'
        ]);

        DB::table('materials')->insert([
            'materialName' => 'Veeners'
        ]);
    }
}
