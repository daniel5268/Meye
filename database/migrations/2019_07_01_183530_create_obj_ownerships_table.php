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

            $table->integer('allowed');
            
            $table->integer('esp_d');
            $table->integer('esp_c');
            $table->integer('esp_i');
            
            $table->integer('pec_d');
            $table->integer('pec_i');

            $table->integer('cad_d');
            $table->integer('cad_c');
            $table->integer('cad_i');
            
            $table->integer('mus_d');
            $table->integer('mus_i');
            
            $table->integer('bag_1');
            $table->integer('bag_2');
            $table->integer('bag_3');
            $table->integer('bag_4');
            $table->integer('bag_5');
            $table->integer('bag_6');
            $table->integer('bag_7');
            $table->integer('bag_8');
            $table->integer('bag_9');
            $table->integer('bag_10');
            $table->integer('bag_11');
            $table->integer('bag_12');
            $table->integer('bag_13');
            $table->integer('bag_14');
            $table->integer('bag_15');
            $table->integer('bag_16');
            $table->integer('bag_17');
            $table->integer('bag_18');
            
            $table->integer('storage');

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
