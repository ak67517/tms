<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrowdControlDataTable extends Migration
{
    public function up()
    {
        Schema::create('crowd_control_data', function (Blueprint $table) {
            $table->id();
            $table->integer('entered');
            $table->integer('exited');
            $table->integer('current_inside');
            $table->timestamp('timestamp')->default(now());
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('crowd_control_data');
    }
}
