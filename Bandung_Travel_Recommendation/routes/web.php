<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\AdminDestinationController;
use App\Http\Controllers\Backend\AdminUsersController;

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
    return view('/Frontend/landing-page');
});

Route::get('/admin/', [AdminDashboardController::class, 'view'])->name('admin.dashboard');
Route::get('/admin/destination', [AdminDestinationController::class, 'view'])->name('admin.destination');
Route::get('/admin/destination/form', [AdminDestinationController::class, 'loadForm'])->name('admin.destination.form');
Route::post('/admin/destination/add', [AdminDestinationController::class, 'create'])->name('admin.destination.add');
Route::get('/admin/destination/form/{id}', [AdminDestinationController::class, 'loadForm'])->name('admin.destination.form.edit');
Route::get('/admin/type', [AdminDashboardController::class, 'view'])->name('admin.destinationtype');
Route::get('/admin/users', [AdminUsersController::class, 'view'])->name('admin.users');
