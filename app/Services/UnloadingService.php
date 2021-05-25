<?php

namespace App\Services;

use App\Models\ContainerPallet;
use App\Models\Supply;
use App\Models\Task;
use App\Models\TaskAssignment;
use App\Models\TaskToContainerPallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnloadingService
{
    private $supplyService;
    private $locationService;

    public function __construct()
    {
        $this->supplyService = new SupplyService();
        $this->locationService = new WarehouseLocationService();
    }

    public function startUnloading($id, Request $request): void
    {
        $workers = $request->get('workers');

        $this->makeContainerPallets($id);
        $this->setSupplyStatus($id);
        $this->createTasks($workers);
    }

    private function makeContainerPallets(int $id): void
    {
        $supply = Supply::find($id);
        $productsInSupply = $supply->supplyProducts;

        $locations = $this->locationService->getStorageLocations();

        foreach ($productsInSupply as $suppliedProduct) {
            $quantity = $suppliedProduct->pivot->quantity;
            $quantityForPallet = $suppliedProduct->max_quantity_for_pallet;

            foreach ($locations as $location) {
                $containerPallet = new ContainerPallet();
                $containerPallet->product_id = $suppliedProduct->id;
                $containerPallet->warehouse_location_id = $location->id;
                $containerPallet->supply_id = $supply->id;
                $containerPallet->quantity = $quantityForPallet;
                $containerPallet->loaded_quantity = 0;
                $containerPallet->save();

                $quantity -= $quantityForPallet;
                if ($quantity <= 0) continue 2;
            }
        }
    }

    private function setSupplyStatus(int $id): void
    {
        $this->supplyService->updateStatus($id, Supply::STATUS_UNLOADING);
    }

    private function createTasks(array $workers): void
    {

    }

    public function unloadPallet(int $supplyId, int $palletId, int $quantity): void
    {
        $pallet = $this->updatePalletUnloadedQuantity($supplyId, $palletId, $quantity);
        if ($pallet->loaded_quantity >= $pallet->quantity) {
            $this->createTaskForPalletRelocation($palletId);
        }
    }

    private function createTaskForPalletRelocation(int $palletId): void
    {
        $task = new Task();
        $task->type = Task::TASK_TYPE_SUPPLY_RELOCATION;
        $task->save();
        $task->fresh();

        $currentUser = Auth::user();

        $taskAssignment = new TaskAssignment();
        $taskAssignment->task_id = $task->id;
        $taskAssignment->user_id = $currentUser->id;
        $taskAssignment->save();

        $taskToContainerPallet = new TaskToContainerPallet();
        $taskToContainerPallet->task_id = $task->id;
        $taskToContainerPallet->container_pallet_id = $palletId;
        $taskToContainerPallet->save();
    }

    private function updatePalletUnloadedQuantity(int $supplyId, int $palletId, int $quantity): ContainerPallet
    {
        $pallet = ContainerPallet::where([
            ['supply_id', '=', $supplyId],
            ['id', '=', $palletId],
        ])->first();

        $pallet->loaded_quantity = $pallet->loaded_quantity + $quantity;
        $pallet->save();
        return $pallet;
    }
}
