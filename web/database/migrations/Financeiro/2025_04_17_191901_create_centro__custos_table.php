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
        Schema::create('centro_custos', function (Blueprint $table) {
            $table->increments('id_centro_custo');
            $table->integer('tipo')-> nullable(false) -> default(0);
            $table->string('nm_centro_custo', 190)   -> nullable(false);
            $table->string('codcontas', 11)   -> nullable(false)-> default('0.0.0');
            $table->bigInteger('planocontas_id')   -> nullable(false) ->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centro_custos');
    }
};
