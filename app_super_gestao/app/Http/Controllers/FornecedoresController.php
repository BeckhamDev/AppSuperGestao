<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedoresController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }
    public function listar(Request $request){

        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%' )
            ->where('uf', 'like', '%'.$request->input('uf').'%' )
            ->where('email', 'like', '%'.$request->input('email').'%' )
            ->where('site', 'like', '%'.$request->input('site').'%' )
            ->get();

        return view('app.fornecedor.listar', ['fornecedores'=>$fornecedores]);
    }



    public function adicionar(Request $request){
        $msg = '';
        //inclusão
        if($request->input('_token')!= '' && $request->input('id')== ''){
            $regras = [
                'nome'=> 'required|min:3|max:40',
                'uf'=>'required|min:2|max:2',
                'email'=>'email',
                'site'=>'required|min:5|max:40'
            ];

            $feedback = [
                'required'=> 'O campo :attribute precisa ser preenchido',
                'nome.min'=> 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo deve ter no máximo 2 caracteres',
                'email.email' => 'O campo deve conter um email válido'
            ];

            $request->validate($regras, $feedback);

            $fornecedors = new Fornecedor();
            $fornecedors->create($request->all());
            $msg = 'Cadastro Realizado com Sucesso!!';
        };

        //edição
        if($request->input('_token')!= '' && $request->input('id')!= ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = "Dados atualizados com sucesso!";
            }else{
                $msg = "Houve um erro ao atualizar os dados";
            }

            return redirect()->route('app.fornecedor.editar', ['id'=>$request->input('id'), 'msg'=>$msg]);
        }
        return view('app.fornecedor.adicionar', ['msg'=> $msg]);
    }
    public function editar($id, $msg =''){
        $dadosFornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar',['dadosFornecedor'=>$dadosFornecedor, 'msg' => $msg]);
    }

    public function excluir($id){
        //Não apaga do banco, somente não exibe mais nas consultas
        Fornecedor::find($id)->delete();

        //forceDelete apaga até do banco
        //Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor');
    }
}
