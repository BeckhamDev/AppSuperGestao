<?php

namespace App\Http\Controllers;
use App\Models\SiteContato;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos'=>$motivo_contatos]);
    }

    public function SaveContato(Request $request){
        $request->validate(
            [
            'nome'=>'required|min:3|max:30',
            'telefone'=>'required',
            'email'=>'email|required',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:600'
            ],
            [
                'required'=>'O campo :attribute precisa ser preenchido',
                'max'=>'Você ultrapassou o limite máximo de caracteres aceito',
                'email'=>'O email inserido é inválido',
                'min'=>'O :attribute inserido é pequeno demais'
            ]
    );
        //Creating nem rows on table
        $contato = new SiteContato();
        $contato->create($request->all());
        return redirect()->route('site.index');
    }
}
