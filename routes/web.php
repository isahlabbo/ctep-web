<?php
use App\Http\Controllers\AjaxController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('ajax')
   ->group(function() {
    Route::get('/address/state/{stateId}/get-lgas', [App\Http\Controllers\AjaxController::class, 'getLgas']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([])->group(function () {
    Route::name('centre.')
    ->prefix('centre/')
    ->group(function () {
        Route::get('/{profileId}', [App\Http\Controllers\CentreController::class, 'index'])->name('index');
        Route::get('/{profileId}/create', [App\Http\Controllers\CentreController::class, 'create'])->name('create');
        Route::post('/{profileId}/register', [App\Http\Controllers\CentreController::class, 'register'])->name('register');
        
        // centres exam routes
        Route::name('exam.')
        ->prefix('exam/')
        ->group(function () {
            Route::get('/{centreId}', [App\Http\Controllers\ExamController::class, 'index'])->name('index');
            Route::post('/{centreId}/register', [App\Http\Controllers\ExamController::class, 'register'])->name('register');
            
            // centres exam routes
            Route::name('session.')
            ->prefix('session/')
            ->group(function () {
                Route::get('/{examId}', [App\Http\Controllers\ExamSessionController::class, 'index'])->name('index');
                Route::post('/{examId}/register', [App\Http\Controllers\ExamSessionController::class, 'register'])->name('register');
            });
        });
    });
});