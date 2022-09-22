<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidades', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //Creating relationship whith product table
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
        
        //Creating relationship whith product_details table
         Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //removing the realtinships first

        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->dropForeign('produto_detalhes_unidade_id_foreing');
            $table->dropColumn('unidade_id');
        });

        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produtos_unidade_id_foreing');
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
};
