<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Padrão
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor1';
        $fornecedor->site = 'fornecedor.com.br';
        $fornecedor->uf = 'MA';
        $fornecedor->email = 'fornecedor1@teste.com';
        $fornecedor->save();

        //create
        Fornecedor::create([
            'nome'=>'Fornecedor2',
            'site'=>'Fornecedor2.com.br',
            'uf'=>'MA',
            'email'=>'fornecedor2@teste.com'
        ]);

        //insert
        DB::table('fornecedors')->insert([
            'nome'=>'Fornecedor3',
            'site'=>'Fornecedor3.com.br',
            'uf'=>'MA',
            'email'=>'fornecedor3@teste.com'
        ]);

    }
}
