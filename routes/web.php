<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\HistoryController;

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



Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('customers', CustomerController::Class)
    ->except([
        'show'
    ])
    ->middleware(['admin']);
    
    Route::get('/task/assignment-list', [CustomerController::class, 'assignableList'])
    ->name('assignable-list')
    ->middleware(['admin']);
    Route::get('/tasks/{cust_id}/create', [FollowUpController::class, 'create'])
    ->name('taskslockcreate')
    ->middleware(['admin']);

    Route::resource('tasks', FollowUpController::Class)
    ->except([
        'show', 'destroy'
    ]);

    Route::resource('histories', HistoryController::Class)
    ->only([
        'index'
    ]);
        
});

require __DIR__.'/auth.php';
