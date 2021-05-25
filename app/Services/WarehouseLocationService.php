<?php

namespace App\Services;

use App\Models\LocationType;
use App\Models\WarehouseLocation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WarehouseLocationService
{
    public function getList(Request $request)
    {
        $page = $request->get('page');
        $limit = $request->get('limit');

        return WarehouseLocation::orderBy('id', 'desc')->get();
    }

    public function getById($id)
    {
        return WarehouseLocation::where('id', $id)->first();
    }

    public function create(Request $request)
    {
        $data = $request->get('data');

        $aisle = $data['aisle'];
        $bay = (int) $data['bay'];
        $level = (int) $data['level'];
        $warehouseId = (int) $data['warehouse'];
        $locationTypeId = (int) $data['locationType'];
        $storageTypeId = (int) $data['storageType'];
        $palletCapacity = (int) $data['palletCapacity'];
        $quantity = (int) $data['quantity'];
        $bayFrom = (int) $data['bayFrom'];
        $bayTo = (int) $data['bayTo'];

        if (
            $locationTypeId === LocationType::DOCK_LOCATION_TYPE_ID
            || $locationTypeId === LocationType::UNLOAD_DOCK_LOCATION_TYPE_ID
        ) {
            $this->createDockLocations($locationTypeId, $warehouseId, $aisle, $quantity);
        } else {
            $this->createStorageLocations(
                $aisle,
                $bay,
                $level,
                $warehouseId,
                $locationTypeId,
                $storageTypeId,
                $palletCapacity,
                $bayFrom,
                $bayTo
            );
        }
    }

    public function createDockLocations(int $locationTypeId, int $warehouseId, string $aisle, int $quantity)
    {
        for ($i = 1; $i <= $quantity; $i++) {
            $createdModel = new WarehouseLocation();
            $createdModel->aisle = $aisle;
            $createdModel->bay = null;
            $createdModel->level = null;
            $createdModel->warehouse_id = $warehouseId;
            $createdModel->location_type_id = $locationTypeId;
            $createdModel->storage_type_id = null;
            $createdModel->pallet_capacity = null;
            $createdModel->barcode = null;
            $createdModel->save();
        }
    }

    public function createStorageLocations(
        string $aisle,
        int $bay,
        int $level,
        int $warehouseId,
        int $locationTypeId,
        int $storageTypeId,
        int $palletCapacity,
        int $bayFrom,
        int $bayTo
    )
    {
        if ($bayFrom && $bayTo) {
            for ($i = $bayFrom; $i <= $bayTo; $i++) {
                $createdModel = new WarehouseLocation();
                $createdModel->aisle = $aisle;
                $createdModel->bay = $i;
                $createdModel->level = $level;
                $createdModel->warehouse_id = $warehouseId;
                $createdModel->location_type_id = $locationTypeId;
                $createdModel->storage_type_id = $storageTypeId;
                $createdModel->pallet_capacity = $palletCapacity;
                $createdModel->barcode = "";

                $createdModel->save();
                $freshWarehouseLocation = $createdModel->fresh();

                $createdModel->barcode = $this->generateBarcode(
                    $warehouseId,
                    $locationTypeId,
                    $storageTypeId,
                    $freshWarehouseLocation->id
                );

                $createdModel->save();
            }
        } else if ($bay) {
            $createdModel = new WarehouseLocation();
            $createdModel->aisle = $aisle;
            $createdModel->bay = $bay;
            $createdModel->level = $level;
            $createdModel->warehouse_id = $warehouseId;
            $createdModel->location_type_id = $locationTypeId;
            $createdModel->storage_type_id = $storageTypeId;
            $createdModel->pallet_capacity = $palletCapacity;
            $createdModel->barcode = "";

            $createdModel->save();
            $freshWarehouseLocation = $createdModel->fresh();

            $createdModel->barcode = $this->generateBarcode(
                $warehouseId,
                $locationTypeId,
                $storageTypeId,
                $freshWarehouseLocation->id
            );

            $createdModel->save();
        }
    }

    public function generateBarcode(
        $warehouseId,
        $locationTypeId,
        $storageTypeId,
        $warehouseLocationId
    ): string
    {
        $warehousePart = str_pad($warehouseId, 2, '0', STR_PAD_LEFT);
        $locationTypePart = str_pad($locationTypeId, 2, '0', STR_PAD_LEFT);
        $storageTypePart = str_pad($storageTypeId, 2, '0', STR_PAD_LEFT);
        $warehouseLocationIdPart = str_pad($warehouseLocationId, 6, '0', STR_PAD_LEFT);
        return $warehousePart . $locationTypePart . $storageTypePart . $warehouseLocationIdPart;
    }

    public function update($id, Request $request)
    {
        $data = $request->get('data');
        $updatedLocation = WarehouseLocation::find($id);
        if ($updatedLocation) {
            $updatedLocation->pallet_capacity = $data['palletCapacity'];
            $updatedLocation->save();
        }
    }

    public function deleteMany(Request $request)
    {
        WarehouseLocation::destroy($request->get('ids'));
    }

    public function getStorageLocations(): Collection
    {
        return WarehouseLocation::where('location_type_id', LocationType::STORAGE_LOCATION_TYPE_ID)->get();
    }
}
