<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
           $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('city');
            $table->double('Mobile'); 
            $table->string('password');
            $table->string('profile_pic');
            $table->string('profile_id')->nullable();
            $table->boolean('confirmed')->nullable();
            $table->string('token',254)->nullable();
            $table->boolean('verified')->default(false);
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
