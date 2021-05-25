<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    const TASK_TYPE_SUPPLY_RELOCATION = 'supply_relocation';
    const TASK_TYPE_ORDER_PICK = 'order_pick';

    public function taskAssignments(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function containerPallets(): BelongsToMany
    {
        return $this->belongsToMany(ContainerPallet::class, 'task_to_container_pallets');
    }
}
