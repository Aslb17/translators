<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DefaultController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [DefaultController::class, 'index'])->name('index');
Route::get('/traducteurs', [DefaultController::class, 'trad'])->name('traducteurs');

Route::prefix('admin')->group(function(){
Route::get('/',[AdminController::class, 'index'])->middleware(['auth'])->name('admin.index');
Route::get('/edit',[AdminController::class, 'edit'])->middleware(['auth'])->name('admin.edit');
Route::post('/store',[AdminController::class, 'store'])->middleware(['auth'])->name('admin.store');
Route::get('/create',[AdminController::class, 'create'])->middleware(['auth'])->name('admin.create');
Route::get('/delete/{id}',[AdminController::class, 'destroy'])->middleware(['auth'])->name('admin.delete');
Route::get('/edit/{id}',[AdminController::class, 'edit'])->middleware(['auth'])->name('admin.edit');
Route::put('/update/{id}',[AdminController::class, 'update'])->middleware(['auth'])->name('admin.update');

Route::get('/lang',[LangController::class, 'indexL'])->middleware(['auth'])->name('admin.lang');
Route::get('/editl',[LangController::class, 'editl'])->middleware(['auth'])->name('admin.editl');
Route::post('/storel',[LangController::class, 'storel'])->middleware(['auth'])->name('admin.storel');
Route::get('/createl',[LangController::class, 'createl'])->middleware(['auth'])->name('admin.createl');
Route::get('/deletel/{id}',[LangController::class, 'destroyl'])->middleware(['auth'])->name('admin.deletel');
Route::get('/editl/{id}',[LangController::class, 'editl'])->middleware(['auth'])->name('admin.editl');
Route::put('/updatel/{id}',[LangController::class, 'updatel'])->middleware(['auth'])->name('admin.updatel');


});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
