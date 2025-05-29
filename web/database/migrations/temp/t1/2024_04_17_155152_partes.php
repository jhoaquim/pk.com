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
        Schema::create('partes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 70)      -> nullable(false);
            $table->string('email', 70)     -> nullable(false) ->unique();
            $table->string('rg_ie', 15)     -> nullable(false) ->default('0');
            $table->string('cpf_cnpj', 15)  -> nullable(false) ->default(0);
            $table->smallInteger('endereco_id')         -> nullable(false) -> default(0);
            $table->date('dt_nascimento')               -> default(now());
            $table->enum('pessoa_tp', ['F', 'J'])       -> default('F');
            $table->enum('associado', ['true', 'false'])-> default('false');
            $table->integer('associado_id')             -> nullable(false) -> default(0);
            $table->enum('polo', ['A', 'P'])            -> default('A');
            $table->smallInteger('nivel')   -> nullable(false) ->default(1);
            $table->smallInteger('status')  -> nullable(false) ->default(1);
            $table->timestamps();
            $table->timestamp('last_used_at')           -> nullable(false)->default(now());
            $table->longText('obs')                     -> default('Descrição');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partes');
    }
};
