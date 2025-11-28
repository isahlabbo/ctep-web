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
    
    Route::name('school.')
    ->prefix('school/')
    ->group(function () {
        Route::get('/{profileId}', [App\Http\Controllers\SchoolController::class, 'index'])->name('index');
        Route::get('/{profileId}/create', [App\Http\Controllers\SchoolController::class, 'create'])->name('create');
        Route::post('/{profileId}/register', [App\Http\Controllers\SchoolController::class, 'register'])->name('register');
    });

    Route::name('organization.')
    ->prefix('organization/')
    ->group(function () {
        Route::get('/{profileId}', [App\Http\Controllers\OrganizationController::class, 'index'])->name('index');
        Route::get('/{profileId}/create', [App\Http\Controllers\OrganizationController::class, 'create'])->name('create');
        Route::post('/{profileId}/register', [App\Http\Controllers\OrganizationController::class, 'register'])->name('register');
    });

    Route::name('cafe.')
    ->prefix('cafe/')
    ->group(function () {
        Route::get('/{profileId}', [App\Http\Controllers\CafeController::class, 'index'])->name('index');
        Route::get('/{profileId}/create', [App\Http\Controllers\CafeController::class, 'create'])->name('create');
        Route::post('/{profileId}/register', [App\Http\Controllers\CafeController::class, 'register'])->name('register');
    });

    Route::name('centre.')
    ->prefix('centre/')
    ->group(function () {
        Route::get('/{profileId}', [App\Http\Controllers\CentreController::class, 'index'])->name('index');
        Route::get('/{profileId}/create', [App\Http\Controllers\CentreController::class, 'create'])->name('create');
        Route::post('/{profileId}/register', [App\Http\Controllers\CentreController::class, 'register'])->name('register');
    });    
    // centres exam routes
    Route::name('exam.')
    ->prefix('exam/')
    ->group(function () {
        Route::get('/{agentId}', [App\Http\Controllers\ExamController::class, 'index'])->name('index');
        Route::post('/{agentId}/register', [App\Http\Controllers\ExamController::class, 'register'])->name('register');
        
        // centres exam routes
        Route::name('session.')
        ->prefix('session/')
        ->group(function () {
            Route::get('/{examId}', [App\Http\Controllers\ExamSessionController::class, 'index'])->name('index');
            Route::post('/{examId}/register', [App\Http\Controllers\ExamSessionController::class, 'register'])->name('register');
            // centres exam question routes
            Route::name('question.')
            ->prefix('question/')
            ->group(function () {
                Route::get('/{examSessionId}', [App\Http\Controllers\SessionQuestionController::class, 'index'])->name('index');
                Route::post('/{examSessionId}/register', [App\Http\Controllers\SessionQuestionController::class, 'register'])->name('register');  
                Route::post('/{questionId}/update', [App\Http\Controllers\SessionQuestionController::class, 'update'])->name('update'); 
                Route::get('/{questionId}/delete', [App\Http\Controllers\SessionQuestionController::class, 'delete'])->name('delete'); 

            });
            // centres exam student routes
            Route::name('student.')
            ->prefix('student/')
            ->group(function () {
                Route::get('/{examSessionId}', [App\Http\Controllers\SessionStudentController::class, 'index'])->name('index');
                Route::post('/{examSessionId}/register', [App\Http\Controllers\SessionStudentController::class, 'register'])->name('register');  
                Route::post('/{studentId}/update', [App\Http\Controllers\SessionStudentController::class, 'update'])->name('update'); 
                Route::get('/{studentId}/delete', [App\Http\Controllers\SessionStudentController::class, 'delete'])->name('delete'); 

            });
        });
    });
    
});