<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_products')->insert([
            [
                'id' => 1,
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 10
            ],
            [
                'id' => 2,
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 20
            ],
            [
                'id' => 3,
                'order_id' => 1,
                'product_id' => 3,
                'quantity' => 20
            ],
            [
                'id' => 4,
                'order_id' => 2,
                'product_id' => 3,
                'quantity' => 50
            ],
            [
                'id' => 5,
                'order_id' => 3,
                'product_id' => 2,
                'quantity' => 100
            ],
            [
                'id' => 6,
                'order_id' => 3,
                'product_id' => 1,
                'quantity' => 50
            ],
        ]);
    }
}
