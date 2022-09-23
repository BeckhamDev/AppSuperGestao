<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        
        if($request->get('erro')==1){
            $erro =  'Usuário ou senha inseridos são inválidos';    
        }
        if($request->get('erro')==2){
            $erro =  'Você não tem permissão para acessar este sistema';    
        }

        return view('site.login', ['titulo'=>'Login', 'erro'=>$erro]);

    }
    public function sair(){
        echo 'sair';
    }
    public function autenticar(Request $request){
        
        $requisito = [
            'usuario' =>'email',
            'senha' => 'required'
        ]; 

        $feedback = [
            'usuario.email' => 'O email inserido é inválido!',
            'senha.required' => 'O campo senha é obrigatório!'
        ];

        $request->validate($requisito, $feedback);
        
        $email = request()->get('usuario');
        $password = request()->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();
        
        if(isset($usuario->name)){
            session_start();

            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');

        }else{
            return redirect()->route('site.login', ['erro'=> 1]);
        };


    }
}
