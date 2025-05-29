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
        Schema::create('planocontas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('codconta', 11)  -> nullable(false) ->default(0);
            $table->string('descricao', 40) -> nullable(false);
            $table->longText('obs')         -> default('Descrição da Conta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planocontas');
    }
};
