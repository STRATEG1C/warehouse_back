<?php

namespace Database\Seeders;

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
        $this->call([
            WarehouseSeeder::class,
            LocationTypeSeeder::class,
            StorageTypeSeeder::class,
            WarehouseLocationSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            SupplySeeder::class,
            SupplyProductSeeder::class,
            OrderSeeder::class,
            OrdersProductsSeeder::class,
        ]);
    }
}
