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

        return view('site.login', ['titulo'=>'Login', 'erro'=>$erro]);

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
            echo "O usuário existe";
        }else{
            return redirect()->route('site.login', ['erro'=> 1]);
        };


    }
}
