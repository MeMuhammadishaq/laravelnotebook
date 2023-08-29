<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// header
Route::get('/header', function () {
    return view('header');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/data',[DataController::class,'view'])->name('data');
Route::post('/data',[DataController::class,'store'])->name('data');
// read data from table
Route::get('/data',[DataController::class,'read'])->name('data');
//delete
Route::get('/data/delete/{id}',[DataController::class,'delete'])->name('data.delete');
//edit
Route::get('/data/edit/{id}',[DataController::class,'edit'])->name('data.edit');
Route::post('/data/edit/{id}',[DataController::class,'update'])->name('data.update');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reading/{id}',[DataController::class,'reading']);
});

Auth::routes();