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
            $table->integer('price')->nullable();
            $table->integer('damage')->nullable();
            $table->integer('resistence')->nullable();
            $table->integer('of_blood')->nullable();
            $table->integer('cushioned')->nullable();
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
        Schema::dropIfExists('objects');
    }
}
