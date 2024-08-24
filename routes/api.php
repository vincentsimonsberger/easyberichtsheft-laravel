<?php

use App\Http\Controllers\TraineeReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/reports', [TraineeReportController::class, 'index']);
    Route::post('/reports', [TraineeReportController::class, 'store']);
    Route::get('/reports/{id}', [TraineeReportController::class, 'show']);
    Route::put('/reports/{id}', [TraineeReportController::class, 'update']);
    Route::delete('/reports/{id}', [TraineeReportController::class, 'destroy']);
});
