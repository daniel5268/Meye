<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objs', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('name');
            $table->integer('price')->nullable();
            $table->integer('damage')->nullable();
            $table->integer('resistence')->nullable();
            $table->integer('of_blood')->nullable();
            $table->integer('cushioned')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('throw')->nullable();
            $table->integer('duration')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('objs');
    }
}
