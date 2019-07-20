<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjOwnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obj_ownerships', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('obj_id');
            $table->foreign('obj_id')->references('id')->on('objs');
            
            $table->unsignedBigInteger('pj_id');
            $table->foreign('pj_id')->references('id')->on('pjs');

            $table->integer('allowed')->default('0');
            
            $table->integer('esp_d')->default('0');
            $table->integer('esp_c')->default('0');
            $table->integer('esp_i')->default('0');
            
            $table->integer('pec_d')->default('0');
            $table->integer('pec_i')->default('0');

            $table->integer('cad_d')->default('0');
            $table->integer('cad_c')->default('0');
            $table->integer('cad_i')->default('0');
            
            $table->integer('mus_d')->default('0');
            $table->integer('mus_i')->default('0');
            
            $table->integer('bag_1')->default('0');
            $table->integer('bag_2')->default('0');
            $table->integer('bag_3')->default('0');
            $table->integer('bag_4')->default('0');
            $table->integer('bag_5')->default('0');
            $table->integer('bag_6')->default('0');
            $table->integer('bag_7')->default('0');
            $table->integer('bag_8')->default('0');
            $table->integer('bag_9')->default('0');
            $table->integer('bag_10')->default('0');
            $table->integer('bag_11')->default('0');
            $table->integer('bag_12')->default('0');
            $table->integer('bag_13')->default('0');
            $table->integer('bag_14')->default('0');
            $table->integer('bag_15')->default('0');
            $table->integer('bag_16')->default('0');
            $table->integer('bag_17')->default('0');
            $table->integer('bag_18')->default('0');
            
            $table->integer('storage')->default('0');

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
        Schema::dropIfExists('obj_ownerships');
    }
}
