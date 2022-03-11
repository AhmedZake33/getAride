<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatetripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from_point');
            $table->string('to_point');
            $table->integer('user_id');
            $table->time('TakeoffTime');
            $table->string('waypoint1')->nullable();
            $table->string('waypoint2')->nullable();
            
            $table->date('TakeoffDate');
            $table->text('Details');
            $table->float('price');
            $table->string('car_type');
            $table->integer('seats');
            $table->string('car_number');
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
        Schema::dropIfExists('trips');
    }
}
