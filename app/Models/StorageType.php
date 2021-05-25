<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageType extends Model
{
    use HasFactory;

    protected $table = 'storage_types';

    public $timestamps = false;

    /* TODO: Add more storage types here */
    const STORAGE_TYPE_NAMES = [
        'Floor',
        'Shelf',
    ];

    const FLOOR_STORAGE_TYPE_ID = 1;
    const SHELF_STORAGE_TYPE_ID = 2;
}
