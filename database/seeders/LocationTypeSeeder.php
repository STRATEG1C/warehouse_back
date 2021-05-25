<?php

namespace Database\Seeders;

use App\Models\LocationType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locationTypeNames = LocationType::LOCATION_TYPE_NAMES;
        $seedData = [];

        for ($i = 0; $i < count($locationTypeNames); $i++) {
            $seedData[] = [
                'id' => $i + 1,
                'name' => $locationTypeNames[$i]
            ];
        }

        DB::table('location_types')->insert($seedData);
    }
}
