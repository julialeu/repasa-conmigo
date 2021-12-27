<?php

use App\Http\Controllers\AnswerQuestionController;
use App\Http\Controllers\CreateQuestionController;
use App\Http\Controllers\CreateTestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DummyController;
use App\Http\Controllers\GetCorrectAnswerController;
use App\Http\Controllers\ShowQuestionController;
use App\Http\Controllers\ShowTestController;
use App\Http\Controllers\TakeTestController;
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

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware(['auth'])->name('dashboard');

Route::match(['GET', 'POST'],'/crear-test', CreateTestController::class)->middleware(['auth']);

Route::get('/test/{testId}', ShowTestController::class)->middleware(['auth']);

Route::post('/create-question', CreateQuestionController::class)->middleware(['auth']);

Route::get('/take-test/{testId}',TakeTestController::class)->middleware(['auth']);

Route::get('/trial/{trialId}/{questionId}', ShowQuestionController::class)->middleware(['auth']);

Route::get('/correct-answer/{trialId}/{questionId}/{userSelectedOption}', GetCorrectAnswerController::class)->middleware(['auth']);

Route::post('/api/answer/{trialId}/{questionId}', AnswerQuestionController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
