<?php

namespace Database\Seeders;

use App\Models\Supply;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplies')->insert([
            [
                'id' => 1,
                'status' => Supply::STATUS_ARRIVED,
                'creation_date' => date('Y-m-d H:i:s'),
                'arrival_date' => date('Y-m-d H:i:s'),
                'supplier_name' => 'China Gifts',
                'warehouse_location_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'status' => Supply::STATUS_ARRIVED,
                'creation_date' => date('Y-m-d H:i:s'),
                'arrival_date' => date('Y-m-d H:i:s'),
                'supplier_name' => 'Indian fireworks',
                'warehouse_location_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'status' => Supply::STATUS_SENT,
                'creation_date' => date('Y-m-d H:i:s'),
                'arrival_date' => null,
                'supplier_name' => 'Українські феєрверки',
                'warehouse_location_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
