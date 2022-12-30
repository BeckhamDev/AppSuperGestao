<?php

use App\Models\Fornecedor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Criando a tabela em produtos que vai receber a fk de fornecedores
        Schema::table('produtos', function (Blueprint $table) {

            //Inserindo um fornecedor padrão para que receba um id 0 e não quebre a migração
            $fornecedor_id = DB::table('fornecedors')->insertGetId([
            'nome'=> 'fornecedor0',
            'site'=>'site do fornecedor0',
            'uf'=>'MA',
            'email'=> 'email@zero.com',
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->Dropforeign('produtos_fornecedor_id_foreign');
            $table->DropColumns('fornecedor_id');
        });
    }
};
