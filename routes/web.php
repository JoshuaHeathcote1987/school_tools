<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AttendanceExportController;

use App\Http\Livewire\Register;
use App\Http\Livewire\Inventory;
use App\Http\Livewire\Roster;

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

Route::view('/', 'welcome');

Route::get('/attendance', Register::class);
Route::get('/inventory', Inventory::class);
Route::get('/roster', Roster::class);

Route::get('/attendance/export', [AttendanceExportController::class, 'export'])->name('export');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
