<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [taskcontroller::class, 'index'] 
    )->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('tasks', taskController::class);

Route::get('/deleteTask/ {id}', [taskController::class, 'deleteTask']);

Route::get('/finishedTask/ {id}', [taskController::class, 'finishedTask']);
