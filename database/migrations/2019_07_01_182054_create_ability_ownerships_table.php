<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbilityOwnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ability_ownerships', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('ability_id');
            $table->foreign('ability_id')->references('id')->on('abilities');
            
            $table->unsignedBigInteger('pj_id');
            $table->foreign('pj_id')->references('id')->on('pjs');  

            $table->text('notes')->nulable();
            
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
        Schema::dropIfExists('ability_ownerships');
    }
}
