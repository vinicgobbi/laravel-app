<?php

use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update'); // Rota para deletar um chamado
Route::get('/supports/{id}/edit',  [SupportController::class, 'edit'])->name("supports.edit"); // Rota para editar editar um chamado de acordo com o ID
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create'); // Cria um novo chamado
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show'); // Mostra um chamado especifico de acordo com o ID
Route::post('/supports', [SupportController::class, "store"])->name("supports.store"); // Rota de post para armazenar os dados no banco 
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index'); // Página principal com a prévia dos chamados

Route::get('/', function () {
    return view('welcome');
}); // tela de boas vindas do PHP

Route::get('/contato', [SiteController::class, 'contact']); // Chama a classe contact do SiteController
