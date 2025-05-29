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
            $table->timestamps();
            $table->BigInteger('pessoa_id') -> nullable(false) ->default(0);
            $table->string('logradouro', 20)-> nullable(false) ->default('Rua');
            $table->string('endereco', 100) -> nullable(false) ->default('');
            $table->Integer('nr')           -> nullable(false) ->default(0);
            $table->string('complemento', 40)-> nullable(false)->default('');
            $table->string('email', 70)      -> nullable(false) ->unique();
            $table->string('site', 100)      -> nullable(false) ->default('');
            $table->BigInteger('esta_ibge') -> nullable(false) ->default(0);
            $table->Integer('muni_ibge')    -> nullable(false) ->default(0);
            $table->string('cep', 9)        -> nullable(false) ->default(0);
            $table->string('bairro', 50)    -> nullable(false) ->default('Bairro');
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
