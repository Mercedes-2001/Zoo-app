<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\TurnController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\EmpturnController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\CareController;
use Illuminate\Support\Facades\Route;

// Ruta pública: redirige a login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas protegidas
Route::middleware(['auth'])->group(function () {

    Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
    Route::get('/animal', [AnimalController::class, 'index'])->name('animal.index');

    Route::post('/employees/store/todo', [EmployeeController::class, 'storeTodo'])->name('employees.store.todo');
    Route::patch('/employees/{employee}/update/todo', [EmployeeController::class, 'updateTodo'])->name('employees.update.todo');
    Route::put('/employees/{employee}/update/todo', [EmployeeController::class, 'updateTodo']);

    Route::resource('animal', AnimalController::class);
    Route::resource('turns', TurnController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('data', DataController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('food', FoodController::class);
    Route::resource('lots', LotController::class);
    Route::resource('empturns', EmpturnController::class);
    Route::resource('species', SpeciesController::class);
    Route::resource('zones', ZoneController::class);
    Route::resource('care', CareController::class);

    // Ruta protegida para el menú principal
    Route::get('/home', function () {
        return view('menu');
    })->name('home');

});

// Rutas de autenticación (login, registro, etc.)
Auth::routes();
