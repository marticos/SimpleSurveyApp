<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
    Route::get('/surveys/create', [SurveyController::class, 'create'])->name('surveys.create');
    Route::get('/surveys', [SurveyController::class, 'index'])->name('surveys.index');
    Route::post('/surveystore', [SurveyController::class, 'store'])->name('surveys.store');
    Route::get('/surveys/{survey}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/surveys/{survey}/questions', [QuestionController::class, 'store'])->name('questions.store');
});

require __DIR__.'/auth.php';

Route::get('/survey', 'SurveyController@index');
Route::get('/surveys/{survey}', [SurveyController::class, 'show'])->name('surveys.show');
Route::post('/responses', [ResponseController::class, 'store'])->name('responses.store');
Route::get('/survey-list', [SurveyController::class, 'userIndex'])->name('surveys.userIndex');
