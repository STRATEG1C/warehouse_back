<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'id' => 1,
                'created_date' => date('Y-m-d H:i:s'),
                'shipping_date' => date('Y-m-d H:i:s'),
                'status' => Order::STATUS_CREATED
            ],
            [
                'id' => 2,
                'created_date' => date('Y-m-d H:i:s'),
                'shipping_date' => date('Y-m-d H:i:s'),
                'status' => Order::STATUS_CREATED
            ],
            [
                'id' => 3,
                'created_date' => date('Y-m-d H:i:s'),
                'shipping_date' => date('Y-m-d H:i:s'),
                'status' => Order::STATUS_CREATED
            ],
        ]);
    }
}
