<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supply extends Model
{
    use HasFactory;

    protected $table = 'supplies';

    const STATUS_SENT = 'sent';
    const STATUS_ON_WAY = 'on way';
    const STATUS_ARRIVED = 'arrived';
    const STATUS_UNLOADING = 'unloading';

    public function warehouseLocation(): BelongsTo
    {
        return $this->belongsTo(WarehouseLocation::class, 'warehouse_location_id', 'id');
    }

    public function supplyProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'supply_products')->withPivot('quantity');
    }

    public function supplyPallets(): HasMany
    {
        return $this->hasMany(ContainerPallet::class, 'supply_id', 'id');
    }
}
