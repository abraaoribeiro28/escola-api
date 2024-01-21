<?php

use App\Http\Controllers\AlunoCrontoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('alunos', AlunoCrontoller::class);


// Route::get('/alunos', [AlunoCrontoller::class, 'index'])->name('alunos.index');
// Route::get('/alunos/{aluno}', [AlunoCrontoller::class, 'show'])->name('alunos.show');
// Route::post('/alunos', [AlunoCrontoller::class, 'store'])->name('alunos.store');
// Route::put('/alunos/{aluno}', [AlunoCrontoller::class, 'update'])->name('alunos.update');
// Route::delete('/alunos/{aluno}', [AlunoCrontoller::class, 'destroy'])->name('alunos.destroy');
