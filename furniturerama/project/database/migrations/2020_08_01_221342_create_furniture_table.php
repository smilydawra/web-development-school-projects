<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFurnitureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furniture', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned();
            $table->integer('manufacturer_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->string('name', 100);
            $table->decimal('price');
            $table->string('depth', 100);
            $table->string('height', 100);
            $table->string('width', 100);
            $table->decimal('cost');
            $table->longText('description');
            $table->string('color', 45);
            $table->string('image');
            $table->char('SKU', 10)->unique();
            $table->enum('in_stock', ['In Stock', 'Out of Stock'])->default('In Stock');
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
        Schema::dropIfExists('furniture');
    }
}
