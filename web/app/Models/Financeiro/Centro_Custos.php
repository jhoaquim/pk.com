<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro_Custos extends Model
{
    use HasFactory;

    protected $fillable = ['id_tipo', 'nm_centro_custo', 'planocontas_id', 'created_at','updated_at','deleted_at'];
    /*
     Se a sua tabela não usar o padrão 'id' como chave primária, especifique aqui
     protected $primaryKey = 'sua_chave_primaria';
     Se a sua tabela não usar o padrão 'created_at' e 'updated_at' para timestamps, desabilite aqui
     public $timestamps = false;
     Se você quiser especificar o nome da tabela explicitamente (se não seguir o padrão snake_case do nome do model)
     protected $table = 'nome_da_sua_tabela';

     namespace App\Models\Financeiro;: Define o namespace do seu model, correspondendo à estrutura de pastas.
        use Illuminate\Database\Eloquent\Factories\HasFactory;: Trait que permite usar as Factories para criar dados de teste (como você está fazendo).
        use Illuminate\Database\Eloquent\Model;: Classe base para todos os models Eloquent.
        class Centro_Custos extends Model: Define a classe do seu model, estendendo a classe Model.
        protected $fillable = ['nome', 'codigo', 'ativo'];: Este array define quais atributos podem ser atribuídos em massa (por exemplo, ao usar Centro_Custos::create(['nome' => '...', 'codigo' => '...'])). É importante adicionar aqui todas as colunas da sua tabela que você pretende preencher com dados.
        protected $primaryKey = 'sua_chave_primaria';: Se a sua tabela centro_custos não usar a coluna id como chave primária, você deve especificar o nome da sua chave aqui.
        public $timestamps = false;: Por padrão, o Eloquent espera que sua tabela tenha colunas created_at e updated_at para gerenciar timestamps automaticamente. Se a sua tabela não tiver essas colunas, você deve definir $timestamps como false. Se tiver, você não precisa adicionar esta linha (o padrão é true).
        protected $table = 'nome_da_sua_tabela';: Por convenção, o Eloquent assume que o nome da tabela no banco de dados é o plural em snake_case do nome do model (neste caso, centro_custos).
    */
}
