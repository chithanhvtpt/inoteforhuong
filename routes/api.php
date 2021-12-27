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
Route::prefix("/note")->group(function () {
    Route::get("", [\App\Http\Controllers\NoteController::class, "searchAjax"])->name("note.search");
    Route::post("", [\App\Http\Controllers\NoteController::class, "create"])->name("note.create");
    Route::delete("{note}", [\App\Http\Controllers\NoteController::class, "delete"])->name("note.delete");
    Route::get("/{note}", [\App\Http\Controllers\NoteController::class, "detail"])->name("note.detail");
    Route::put("{note}", [\App\Http\Controllers\NoteController::class, "edit"])->name("note.edit");
});
Route::post('reset-password', [\App\Http\Controllers\ResetPasswordController::class, "sendMail"]);
Route::put('reset-password/{token}', [\App\Http\Controllers\ResetPasswordController::class, "reset"]);

