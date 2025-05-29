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
        Schema::create('associados', function (Blueprint $table) {

                $table->increments('id');
                $table->rememberToken();
                $table->timestamps();
                $table->smallInteger('pessoa')      -> nullable(false) ->default(0);
                $table->smallInteger('nivel')       -> nullable(false) ->default(1);
                $table->enum('status', ['A', 'I'])  -> default('A');
                $table->string('email', 70)     -> nullable(false) ->unique();
                $table->string('doc_ident', 15) -> nullable(false) ->default('0');
                $table->smallInteger('endereco_id') -> nullable(false) -> default(0);
                $table->timestamp('last_used_at')   -> nullable(false)->default(now());
                $table->longText('obs')             -> default('Descrição');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associados');
    }
};
