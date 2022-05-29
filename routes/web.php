<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\TransporterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;

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
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('fetch/record', [SearchController::class, 'fetchRecord'])
        ->name('fetch.record');

Route::middleware('auth-buyer')->group(function () {
    Route::get('buyer/dashboard',[BuyerController::class, 'showDashboard'])
        ->middleware(['auth'])->name('buyer/dashboard');
});

Route::middleware('auth-transporter')->group(function () {
    Route::get('transporter/dashboard',[TransporterController::class, 'showDashboard'])
    ->middleware(['auth'])->name('transporter/dashboard');    
});

Route::middleware('auth-farmer')->group(function () {
    Route::get('farmer/dashboard',[FarmerController::class, 'showDashboard'])
    ->middleware(['auth'])->name('farmer/dashboard');
    
    Route::get('farmer/produce',[FarmerController::class, 'showProduce'])
    ->middleware(['auth'])->name('farmer/produce');

    Route::post('farmer/add/produce',[FarmerController::class, 'addProduce'])
    ->middleware(['auth'])->name('farmer/add/produce');

    Route::post('farmer/delete/produce',[FarmerController::class, 'deleteProduce'])
    ->middleware(['auth'])->name('farmer/delete/produce');
});

Route::middleware('auth-admin')->group(function () {
    Route::get('admin/dashboard',[AdminController::class, 'showDashboard'])
    ->middleware(['auth'])->name('admin/dashboard');
    
});

require __DIR__.'/auth.php';