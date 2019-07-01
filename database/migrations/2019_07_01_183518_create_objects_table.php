<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('name');
            $table->integer('price')->nulable();
            $table->integer('damage')->nulable();
            $table->integer('resistence')->nulable();
            $table->integer('of_blood')->nulable();
            $table->integer('cushioned')->nulable();
            $table->text('description')->nulable();
            $table->boolean('standard');
            $table->boolean('packable');
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
        Schema::dropIfExists('objects');
    }
}
