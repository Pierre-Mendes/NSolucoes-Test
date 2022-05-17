<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserModuleController;
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

Route::get('/', [CustomAuthController::class, 'loginView'])->name('login.view');
Route::post('/validar/login', [CustomAuthController::class, 'validarLogin'])->name('validar.login');
Route::get('/registrar_usuario/view', [CustomAuthController::class, 'registrarUsuarioView'])->name('registrar_usuario.view');
Route::post('/registrar/usuario', [CustomAuthController::class, 'registrarUsuario'])->name('registrar_usuario');
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/moduloUsuario/gerenciar', [UserModuleController::class, 'moduloUsuarios'])->name('moduloUsuario.gerenciar');
Route::post('/moduloUsuario/ver-informacoes', [UserModuleController::class, 'buscarInfosUsuario'])->name('moduloUsuario.ver');
Route::post('/moduloUsuario/editar-informacoes', [UserModuleController::class, 'editarInfosUsuario'])->name('moduloUsuario.editar');
Route::post('/moduloUsuario/editar-informacoes/salvar', [UserModuleController::class, 'salvarInfosUsuario'])->name('moduloUsuario.salvar');
Route::post('/moduloUsuario/excluir-informacoes/excluir', [UserModuleController::class, 'excluirInfosUsuario'])->name('moduloUsuario.excluir');

