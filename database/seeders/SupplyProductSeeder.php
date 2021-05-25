<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supply_products')->insert([
            [
                'supply_id' => 1,
                'product_id' => 1,
                'quantity' => 100
            ],
            [
                'supply_id' => 1,
                'product_id' => 2,
                'quantity' => 80
            ],
            [
                'supply_id' => 1,
                'product_id' => 3,
                'quantity' => 60
            ],

            [
                'supply_id' => 2,
                'product_id' => 4,
                'quantity' => 50
            ],
            [
                'supply_id' => 2,
                'product_id' => 5,
                'quantity' => 80
            ],
            [
                'supply_id' => 2,
                'product_id' => 6,
                'quantity' => 20
            ],

            [
                'supply_id' => 3,
                'product_id' => 6,
                'quantity' => 30
            ],
        ]);
    }
}
