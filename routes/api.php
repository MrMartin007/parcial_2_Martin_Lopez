<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-libro', [\App\Http\Controllers\LibroController::class, 'getAll'])->name('api-getAll');
Route::put('save-libro', [\App\Http\Controllers\LibroController::class, 'saveLibro'])->name('api-saveLibro');
Route::delete('delete-libro/{id}', [\App\Http\Controllers\LibroController::class, 'deleteLibro'])->name('api-deleteLibro');
Route::post('edit-libro/{id}', [\App\Http\Controllers\LibroController::class, 'editLibroo'])->name('api-editLibroo');

