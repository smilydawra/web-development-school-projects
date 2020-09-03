<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('shippingStreet', 255);
            $table->string('shippingProvince', 255);
            $table->string('shippingCity', 255);
            $table->string('shippingPost', 45);
            $table->decimal('shippingCost');
            $table->enum('shippingStatus', ['delivered', 'pending'])->default('pending');
            $table->enum('transactionStatus', ['complete', 'incomplete'])->default('incomplete');
            $table->decimal('subtotal');
            $table->decimal('GST')->nullable();
            $table->decimal('PST')->nullable();
            $table->decimal('HST')->nullable();
            $table->decimal('finalPrice');
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
        Schema::dropIfExists('orders');
    }
}
