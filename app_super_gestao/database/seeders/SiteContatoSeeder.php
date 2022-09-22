<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(98) 98418-1813';
        // $contato->email = 'contato@sg.com.br';
        // $contato->motivo_contato  = '1';
        // $contato->mensagem = 'Seja bem vindo ao sistema!';
        // $contato->save();

        SiteContato::factory()->count(100)->hasPosts(1)->create();
        
    }
}
