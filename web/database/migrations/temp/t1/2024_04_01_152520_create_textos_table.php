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
        Schema::create('textos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 70)        -> nullable(false);
            $table->integer('area_id')        -> nullable(false) -> default(0);
            $table->enum('status', ['A', 'I'])-> default('A');
            $table->timestamps();
            $table->longText('obs')           -> default('Descrição do texto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('textos');
    }
};
