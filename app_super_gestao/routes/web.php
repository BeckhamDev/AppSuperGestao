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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\http\Middleware\LogAcessoMiddleware;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use GuzzleHttp\Middleware;

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobreNos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'SaveContato'])->name('site.contato');
Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('site.Teste');


Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');
Route::fallback(function(){echo 'Ih doidão tu tá no lugar errado. <a href="'.route('site.index').'">Clica aqui</a>';});

Route::middleware('autenticate')->prefix('/app')->group(function(){
	Route::get('/home', [HomeController::class, 'index'])->name('app.home');
	Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
	Route::get('/fornecedor', [FornecedoresController::class, 'index'])->name('app.fornecedor');
	Route::get('/fornecedor/adicionar', [FornecedoresController::class, 'adicionar'])->name('app.fornecedor.adicionar');
	Route::post('/fornecedor/adicionar', [FornecedoresController::class, 'adicionar'])->name('app.fornecedor.adicionar');
	Route::post('/fornecedor/listar', [FornecedoresController::class, 'listar'])->name('app.fornecedor.listar');
	Route::get('/fornecedor/listar', [FornecedoresController::class, 'listar'])->name('app.fornecedor.listar');
	Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedoresController::class, 'editar'])->name('app.fornecedor.editar');
	Route::get('/fornecedor/excluir/{id}', [FornecedoresController::class, 'excluir'])->name('app.fornecedor.excluir');


    //Produtos
	Route::resource('pedido', PedidoController::class);
	Route::resource('produto', ProdutoController::class);
	Route::resource('produtoDetalhe', ProdutoDetalheController::class);
	Route::resource('cliente', ClienteController::class);
	Route::resource('pedidoProduto', PedidoProdutoController::class);
});

