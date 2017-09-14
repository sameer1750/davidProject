<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('photo')->nullable();
            $table->string('member')->nullable();
            $table->string('icecream')->nullable();
            $table->string('phone')->nullable();
            $table->string('street1')->nullable();
            $table->string('street2')->nullable();
            $table->string('street3')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
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
        Schema::dropIfExists('user_data');
    }
}
