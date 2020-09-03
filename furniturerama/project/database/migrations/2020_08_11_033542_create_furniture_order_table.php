<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFurnitureOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furniture_order', function (Blueprint $table) {
            $table->id();
            $table->integer('furniture_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('quantity')->nullable();
            $table->decimal('itemPrice')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('furniture_order');
    }
}
