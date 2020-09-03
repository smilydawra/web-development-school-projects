<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeedReviewsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('reviews')->insert([
            'user_id' => 1,
            'furniture_id' => 1,
            'rating' => 4,
            'title' => 'Recommended!',
            'comment' => 'I am happy with this product',
            'created_at' => Carbon::now(), 
        ]);
        DB::table('reviews')->insert([
            'user_id' => 2,
            'furniture_id' => 1,
            'rating' => 1,
            'title' => 'This is horrible',
            'comment' => 'I am not happy with this product',
            'created_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'user_id' => 3,
            'furniture_id' => 2,
            'rating' => 3,
            'title' => "It's good value for money",
            'comment' => 'Practical and strong sofa. It is a good buy',
            'created_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'user_id' => 4,
            'furniture_id' => 2,
            'rating' => 4,
            'title' => "Very comfortable Sofa",
            'comment' => 'Bought this about two weeks ago and i would love to get another.',
            'created_at' => Carbon::now(),
        ]);                         
        
    }
}
