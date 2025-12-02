<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;

Route::get('/exports/download/{filename}', [ExportController::class, 'download'])
    ->name('exports.download');
    
Route::post('/builds/callback', [App\Http\Controllers\BuildCallbackController::class, 'callback'])
    ->name('builds.callback');
