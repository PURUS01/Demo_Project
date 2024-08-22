<?php

use App\Events\popupMessage;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //task controller function 
    Route::get('/task',[TaskController::class,'index'])->name('task');

Route::get('/task_form',[TaskController::class,'create'])->name('task.form');
Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');

Route::post('/create_task',[TaskController::class,'store'])->name('task.store');
Route::get('task/{task}/show',[TaskController::class,'show'])->name('task.show');
Route::put('task/{task}/update',[TaskController::class,'update'])->name('task.update');
Route::delete('task/{task}/delete',[TaskController::class,'destroy'])->name('task.delete');

});

require __DIR__.'/auth.php';

