<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WarehouseLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_locations', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('aisle')->nullable();
            $table->integer('bay')->nullable();
            $table->integer('level')->nullable();
            $table->unsignedInteger('warehouse_id');
            $table->unsignedInteger('location_type_id');
            $table->unsignedInteger('storage_type_id')->nullable();
            $table->integer('pallet_capacity')->nullable();
            $table->string('barcode')->nullable();
            $table->timestamps();
        });

        Schema::table('warehouse_locations', function (Blueprint $table) {
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('location_type_id')->references('id')->on('location_types');
            $table->foreign('storage_type_id')->references('id')->on('storage_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_locations');
    }
}
