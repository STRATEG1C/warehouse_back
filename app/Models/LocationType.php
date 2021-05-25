<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationType extends Model
{
    use HasFactory;

    protected $table = 'location_types';

    public $timestamps = false;

    /* TODO: Add more location types here */
    const LOCATION_TYPE_NAMES = [
        'Dock',
        'Storage',
        'Unload Dock',
    ];

    const DOCK_LOCATION_TYPE_ID = 1;
    const STORAGE_LOCATION_TYPE_ID = 2;
    const UNLOAD_DOCK_LOCATION_TYPE_ID = 3;
}
