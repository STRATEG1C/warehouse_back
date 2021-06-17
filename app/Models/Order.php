<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    const STATUS_CREATED = 'created';
    const STATUS_IN_PROGRESS = 'in progress';
    const STATUS_IN_COMPLETED = 'completed';

    protected $table = 'orders';
    public $timestamps = false;

    public function orderedProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'orders_products')->withPivot('quantity');
    }
}
