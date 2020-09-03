<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userFirstName', 30);
            $table->string('userLastName', 50);
            $table->string('image')->nullable();
            $table->date('birthDate');
            $table->string('email', 255)->unique();
            $table->string('phone', 20);
            $table->string('street', 255);
            $table->string('post', 45);
            $table->string('city', 45);
            $table->string('province', 45);
            $table->boolean('admin')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
