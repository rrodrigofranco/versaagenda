<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdicionarController;
use App\Http\Controllers\TarefasController;
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


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile/{id}', [ProfileController::class, 'editarProfile'])->name('editarProfile');
Route::get('/tarefas', [TarefasController::class, 'index'])->name('listartarefas');
Route::get('/tarefas/pendentes', [TarefasController::class, 'pendentes'])->name('listarpendentes');
Route::delete('/tarefas/{id}', [TarefasController::class, 'deletar'])->name('tarefas.deletar');
Route::get('/tarefas/{id}', [TarefasController::class, 'formEditar'])->name('tarefas.formEditar');
Route::put('/tarefas/{id}', [TarefasController::class, 'editarTarefa'])->name('editarTarefa');
Route::get('/adicionar', [AdicionarController::class, 'index']);
Route::post('/adicionar', [AdicionarController::class, 'adicionar'])->name('adicionar');
