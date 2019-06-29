<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pjs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('nomb');
            $table->string('tipo');
            
            //--- comportamiento
            $table->tinyInteger('cari')->default(0);
            $table->tinyInteger('vill')->default(0);
            $table->tinyInteger('hero')->default(0);
            
            //--- visual
            $table->integer('peso')->default(0);
            $table->integer('altu')->default(0);
            $table->integer('apar')->default(0);
            
            //--- reservas
            $table->integer('vida')->default(0);
            $table->integer('ener')->default(0);
            $table->integer('ener2')->default(0);
            
            //--- tipo 1
             //--fisicos
            $table->integer('fuer')->default(0);
            $table->integer('agil')->default(0);
            $table->integer('velo')->default(0);
            $table->integer('resi')->default(0);
             //--mentales
            $table->integer('inte')->default(0);
            $table->integer('sabi')->default(0);
            $table->integer('conc')->default(0);
            $table->integer('volu')->default(0);
             //-- coordinacion
            $table->integer('prec')->default(0);
            $table->integer('calc')->default(0);
            $table->integer('rang')->default(0);
            $table->integer('refl')->default(0);
            
            //--- tipo 2
            $table->integer('pote')->default(0);
            $table->integer('vita')->default(0);
            
            $table->integer('pura')->default(0);
            $table->integer('obje')->default(0);

            $table->integer('iluc')->default(0);
            $table->integer('ment')->default(0);

            //--- tipo 3

            $table->integer('hs1')->default(0);
            $table->integer('hs2')->default(0);
            $table->integer('hs3')->default(0);
            $table->integer('hs4')->default(0);

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
        Schema::dropIfExists('pjs');
    }
}
