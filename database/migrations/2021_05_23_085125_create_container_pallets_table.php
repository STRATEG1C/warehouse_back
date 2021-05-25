<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainerPalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_pallets', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('warehouse_location_id');
            $table->unsignedInteger('supply_id');
            $table->integer('quantity');
            $table->integer('loaded_quantity');

        });

        Schema::table('supply_pallets', function (Blueprint $table) {
            $table->foreign('warehouse_location_id')->references('id')->on('warehouse_locations');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('supply_id')->references('id')->on('supplies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supply_pallets');
    }
}
