<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Food extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('min_length', 8, 2);
            $table->decimal('max_length', 8, 2);
            $table->decimal('weight', 8, 2);
            $table->unsignedInteger('weight_unit_id');
            $table->string('color');

            $table->foreign('weight_unit_id')->references('id')->on('weight_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
}
