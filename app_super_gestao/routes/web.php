<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Need to call the class before write the route line
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\LoginController;
use App\http\Middleware\LogAcessoMiddleware;
use GuzzleHttp\Middleware;

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobreNos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'SaveContato'])->name('site.contato');
Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('site.Teste');
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');
Route::fallback(function(){echo 'Ih doidão tu tá no lugar errado. <a href="'.route('site.index').'">Clica aqui</a>';});

Route::middleware('autenticate')->prefix('/app')->group(function(){
	Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
	Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('app.fornecedores');
	Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
});

