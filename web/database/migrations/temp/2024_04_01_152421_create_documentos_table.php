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
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('processo_id')->unsigned();
        /*    $table->unsignedBigInteger('movimento_id');
              $table->foreign('movimento_id') ->references('id')->on('movimentos');*/
            $table->string('descricao', 70) -> nullable(false);
            $table->string('tipo', 70) -> nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
