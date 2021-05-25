<?php

namespace Database\Seeders;

use App\Models\StorageType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storageTypeNames = StorageType::STORAGE_TYPE_NAMES;
        $seedData = [];

        for ($i = 0; $i < count($storageTypeNames); $i++) {
            $seedData[] = [
                'id' => $i + 1,
                'name' => $storageTypeNames[$i]
            ];
        }

        DB::table('storage_types')->insert($seedData);
    }
}
