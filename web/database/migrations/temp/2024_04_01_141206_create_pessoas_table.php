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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id()->primary();
            $table->rememberToken();
            $table->timestamps();
            $table->smallInteger('nivel')   -> nullable(false) ->default(1);
            $table->tinyInteger('status')   ->default(1);
            $table->string('nome', 70)      -> nullable(false);
            $table->string('email', 70)     -> nullable(false) ->unique();
            $table->string('rg_ie', 15)     -> nullable(false) ->default('0');
            $table->string('cpf_cnpj', 15)  -> nullable(false) ->default(0);
            $table->string('pis', 15)       -> nullable(false) ->default(0);
            $table->smallInteger('endereco_id')         -> nullable(false) -> default(0);
            $table->date('dt_nascimento')               -> default('1900-01-01');
            $table->string('avatar', 100)               -> nullable(false) -> default('nobody.png');
            $table->tinyInteger('pessoa_tp')            ->default('F');
            $table->enum('pessoa_tp', ['F', 'J'])       -> default('F');
            $table->enum('associado', ['true', 'false'])-> default('false');
            $table->integer('associado_id')             -> nullable(false) -> default(0);
            $table->timestamp('last_used_at')           -> nullable(false)->default(now());
            $table->longText('obs')                     -> default('Descrição');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
