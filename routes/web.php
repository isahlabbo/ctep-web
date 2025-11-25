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
    });
});