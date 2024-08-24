<?php

use App\Models\TraineeReport;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/app', function () {
    $reports = TraineeReport::all()->toArray();
    return view('reports', [
        'language' => "de",
        'title' => "Berichtsheft Dashboard",
        'description' => "Berichtsheft mit Laravel dies das",
        'base_url' => "https://easyberichtsheft-laravel.ddev.site/",
        'api_url' => "https://easyberichtsheft-laravel.ddev.site/api/v1/reports",
        'reports' => $reports
    ]);
});

Route::get('/ui-elements', function () {
    return view('ui-elements', [
        'language' => "de",
        'title' => "Berichtsheft Dashboard",
        'description' => "Berichtsheft mit Larabel dies das",
        'base_url' => "https://easyberichtsheft-laravel.ddev.site/"
    ]);
});

Route::get('/tables', function () {
    return view('tables', [
        'language' => "de",
        'title' => "Berichtsheft Dashboard",
        'description' => "Berichtsheft mit Larabel dies das",
        'base_url' => "https://easyberichtsheft-laravel.ddev.site/"
    ]);
});

Route::get('/forms', function () {
    return view('forms', [
        'language' => "de",
        'title' => "Berichtsheft Dashboard",
        'description' => "Berichtsheft mit Larabel dies das",
        'base_url' => "https://easyberichtsheft-laravel.ddev.site/"
    ]);
});
