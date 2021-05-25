<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => '50s Fiberglass Rack',
                'description' => 'Our biggest rack, the 50-shot is ready for a night of mayhem, or one explosive finale! Comes complete with 50 fiberglass tubes. Perfect for shooting 60-gram canister shells, ball shells, multi-break shells and more.',
                'max_quantity_for_pallet' => 10,
                'barcode' => '000000000001',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'name' => 'Grand Slam Shells - 1.75"',
                'description' => 'An impressive piece to say the least! Each massive shell thumps when it leaves the tube, propelling four great effects into the sky.',
                'max_quantity_for_pallet' => 10,
                'barcode' => '000000000002',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'name' => 'Lucky 13',
                'description' => 'A combination of single ball and canister, smoke-N-Mirror shells, double ball and torpedo shells, triple ball and cylinder shells, quad and five breaks. 78 Shells, 186 Breaks',
                'max_quantity_for_pallet' => 10,
                'barcode' => '000000000003',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'name' => '4th of July Conic',
                'description' => 'This patriotic fountain is a great value with red bouquet to silver chrysanthemums to crackling to blue.',
                'max_quantity_for_pallet' => 10,
                'barcode' => '000000000004',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5,
                'name' => 'After the Hunt',
                'description' => 'After a day in the field, sit around with your friends and enjoy this bonfire show. Features silver willow with red glitter, gold willow with yellow and blue, silver spring, gold spider, and more.',
                'max_quantity_for_pallet' => 10,
                'barcode' => '000000000005',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6,
                'name' => 'Jump Ship',
                'description' => 'The landing craft slows with orange and lemon stars with silver crackling, gold shower and blue stars then five jumping jacks bail out. Next, blue showers and red stars with silver glitter and five more jumping jacks bail. Then red, green and blue stars with silver crackling and five jumping jacks jump ship.',
                'max_quantity_for_pallet' => 10,
                'barcode' => '000000000006',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
