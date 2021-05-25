<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('status');
            $table->dateTime('creation_date');
            $table->dateTime('arrival_date')->nullable();
            $table->string('supplier_name');
            $table->unsignedInteger('warehouse_location_id');
            $table->timestamps();
        });

        Schema::table('supplies', function (Blueprint $table) {
            $table->foreign('warehouse_location_id')->references('id')->on('warehouse_locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
