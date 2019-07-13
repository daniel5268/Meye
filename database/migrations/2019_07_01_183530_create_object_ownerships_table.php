<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectOwnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_ownerships', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('object_id');
            $table->foreign('object_id')->references('id')->on('objects');
            
            $table->unsignedBigInteger('pj_id');
            $table->foreign('pj_id')->references('id')->on('pjs');

            $table->integer('amount');

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
        Schema::dropIfExists('object_ownerships');
    }
}
