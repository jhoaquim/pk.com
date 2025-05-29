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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pessoa_id')->unsigned();
            $table->foreign('pessoas_id')->references('id')->on('pessoas');
            $table->string('logradouro') -> nullable(false);
            $table->string('endereco') -> nullable(false);
            $table->smallInteger('nr')  -> nullable(false) ->default(0);
            $table->string('complemento') -> nullable(true);
            $table->string('email', 70)   -> nullable(false);
            $table->string('site') -> nullable(true);
            $table->smallInteger('esta_ibge')-> nullable(false) ->default(0);
            $table->Integer('muni_ibge')-> nullable(false) ->default(0);
            $table->string('cep')   -> nullable(false) ->default('0');
            $table->string('bairro')-> nullable(false) ->default('Bairro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
