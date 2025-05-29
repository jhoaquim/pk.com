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
        Schema::create('documento_contas', function (Blueprint $table) {
            $table->id();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->bigInteger('planocontas_id')->unsigned();
            $table->timestamps();
            $table->string('codconta', 11)   -> nullable(false) ->default(0);
            $table->string('documento', 40)  -> nullable(false) ->default(0);
            $table->decimal('valor', 11, 3);
            $table->date('emissao');
            $table->date('vencimento');
            $table->longText('obs')          -> default('Obs do Documento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documento_contas');
    }
};
