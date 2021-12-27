<?php

use App\Http\Controllers\SocialController;
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
Route::prefix("/notes")->group(function (){
    Route::get("/", [\App\Http\Controllers\NoteController::class, "index"])->name("notes.index");
    Route::get("/create", [\App\Http\Controllers\NoteController::class, "showFormCreate"])->name("notes.create");
    Route::post("/create", [\App\Http\Controllers\NoteController::class, "create"]);
    Route::delete("/delete/{note}", [\App\Http\Controllers\NoteController::class, "delete"])->name("notes.delete");
    Route::get("/edit/{note}", [\App\Http\Controllers\NoteController::class, "showFormEdit"])->name("notes.edit");
    Route::put("/edit/{note}", [\App\Http\Controllers\NoteController::class, "edit"]);
    Route::get("/detail/{id}", [\App\Http\Controllers\NoteController::class, "detail"])->name("notes.detail");
});
Route::prefix("/auth")->group(function (){
    Route::get("/login", [\App\Http\Controllers\UserController::class, "showFormLogin"])->name("login.form");
    Route::post("/login", [\App\Http\Controllers\UserController::class, "login"])->name("auth.login");
    Route::get("/register", [\App\Http\Controllers\UserController::class, "showFormRegister"])->name("register.form");
    Route::post("/register", [\App\Http\Controllers\UserController::class, "register"])->name("auth.register");
    Route::get("/logout", [\App\Http\Controllers\UserController::class, "logout"])->name("auth.logout");
});
Route::prefix("/categories")->group(function (){
    Route::get("/", [\App\Http\Controllers\CategoryController::class, "index"])->name("categories.index");
});

Auth::routes();


Route::get('/auth/redirect/{provider}', [SocialController::class,'redirect']);

Route::get('/callback/{provider}', [SocialController::class, 'callback']);
