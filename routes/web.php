<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\AttendanceExportController;
use App\Http\Controller\LogoutController;
use App\Http\Controllers\MealExportController;

use App\Http\Livewire\Register;
use App\Http\Livewire\Inventory;
use App\Http\Livewire\Roster;
use App\Http\Livewire\Book;
use App\Http\Livewire\Meals;

Route::view('/', 'welcome');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => [
    'accesscheck'
]], function () {
    Route::get('/attendance', Register::class);
    Route::get('/meals', Meals::class);
    Route::get('/inventory', Inventory::class);
    Route::get('/roster', Roster::class);
    Route::get('/books', Book::class);
    Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

    Route::get('/logout', function () {
        Session::invalidate();
        return redirect('/');
    });
});

Route::get('/meals/index', [MealExportController::class, 'index']);

Route::get('/meals/topdf', [MealExportController::class, 'toPdf']);