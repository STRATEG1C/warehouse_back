<?php

namespace Database\Seeders;

use App\Models\LocationType;
use App\Models\StorageType;
use App\Services\WarehouseLocationService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warehouseLocationService = new WarehouseLocationService();

        $seedData = [];

        $aisles = ['A', 'B', 'C'];
        $baysPerAisle = 4;
        $levelsPerBay = 2;

        $dockLocationNumber = 2;
        $dockUnloadLocationNumber = 2;

        $id = 1;

        foreach ($aisles as $aisle) {
            for ($bay = 1; $bay <= $baysPerAisle; $bay++) {
                for ($level = 1; $level <= $levelsPerBay; $level++) {
                    $seedData[] = [
                        'id' => $id,
                        'aisle' => $aisle,
                        'bay' => $bay,
                        'level' => $level,
                        'warehouse_id' => 1,
                        'location_type_id' => LocationType::STORAGE_LOCATION_TYPE_ID,
                        'storage_type_id' => StorageType::SHELF_STORAGE_TYPE_ID,
                        'pallet_capacity' => 1,
                        'barcode' => $warehouseLocationService->generateBarcode(
                            1,
                            2,
                            2,
                            $id
                        ),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    $id++;
                }
            }
        }

        for ($dock = 1; $dock <= $dockLocationNumber; $dock++) {
            $seedData[] = [
                'id' => $id,
                'aisle' => 'D',
                'bay' => null,
                'level' => null,
                'warehouse_id' => 1,
                'location_type_id' => LocationType::DOCK_LOCATION_TYPE_ID,
                'storage_type_id' => null,
                'pallet_capacity' => null,
                'barcode' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $id++;
        }

        for ($dockUnload = 1; $dockUnload <= $dockUnloadLocationNumber; $dockUnload++) {
            $seedData[] = [
                'id' => $id,
                'aisle' => 'UD',
                'bay' => null,
                'level' => null,
                'warehouse_id' => 1,
                'location_type_id' => LocationType::UNLOAD_DOCK_LOCATION_TYPE_ID,
                'storage_type_id' => null,
                'pallet_capacity' => null,
                'barcode' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $id++;
        }

        DB::table('warehouse_locations')->insert($seedData);
    }
}
