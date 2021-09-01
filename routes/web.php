<?php

use App\Http\Controllers\CreateTestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DummyController;
use App\Http\Controllers\ShowTestController;
use App\Models\Test;
use Illuminate\Support\Facades\Route;

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

Route::get('/dummy', DummyController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::match(['GET', 'POST'],'/crear-test', CreateTestController::class)->middleware(['auth']);

Route::get('/test/{testId}', ShowTestController::class)->middleware(['auth']);



require __DIR__.'/auth.php';
