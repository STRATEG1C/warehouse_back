<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskToContainerPallet extends Model
{
    use HasFactory;

    protected $table = 'task_to_container_pallets';
    public $timestamps = false;

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function container_pallet(): BelongsTo
    {
        return $this->belongsTo(ContainerPallet::class);
    }
}
