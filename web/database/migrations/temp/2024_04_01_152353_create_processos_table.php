<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->integer('movimento_id')->unsigned();
            //$table->foreign('movimentacao_id')->references('id')->on('movimentacao');
            $table->integer('areas_id')->unsigned();
            //$table->foreign('id_areas')->references('id')->on('areas');
            $table->string('referente')-> nullable(false) ->default(0);
            $table->timestamps();
            $table->date('dt_system')->default(now());
            $table->smallInteger('status')-> nullable(false) ->default(0);
            //$table->mediumtext('conteudo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processos');
    }
};
