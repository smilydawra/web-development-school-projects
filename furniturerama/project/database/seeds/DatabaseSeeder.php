<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(SeedFurnitureTable::class);
        $this->call(SeedCategoriesTable::class);
        $this->call(SeedUsersTable::class);
        $this->call(SeedMaterialsTable::class);
        $this->call(SeedOrdersTable::class);
        $this->call(SeedPromotionsTable::class);
        $this->call(SeedReviewsTable::class);
        $this->call(SeedTaxesTable::class);
        $this->call(SeedManufacturersTable::class);
        $this->call(SeedTransactionsTable::class);
        $this->call(SeedFurnitureOrderTable::class);
    }
}
