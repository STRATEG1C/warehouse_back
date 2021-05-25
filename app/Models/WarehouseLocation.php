<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WarehouseLocation extends Model
{
    use HasFactory;

    protected $table = 'warehouse_locations';

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function locationType(): BelongsTo
    {
        return $this->belongsTo(LocationType::class);
    }

    public function storageType(): BelongsTo
    {
        return $this->belongsTo(StorageType::class);
    }
}
