<?php

use App\Helper\Pdf\ReportGenerator;
use App\Models\TraineeReport;
use Illuminate\Support\Facades\Route;
use mikehaertl\pdftk\Pdf;

Route::get('/', function () {
    return redirect('/app');
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


/**
 * Export a report by its ID as PDF file
 * example URL: /export/pdf/9cd85279-fff9-4d21-87e4-f93e32585769
 */
Route::get('/export/pdf/{id}', function ($id) {
    $generator = new ReportGenerator();
    try {
        $report = $generator->generateReport($id);
        $templateFilePath = public_path() . ReportGenerator::PDF_TEMPLATE_FILE_PATH;
        $newPdf = new Pdf($templateFilePath);
        $resultPdf = $newPdf->fillForm($report)->needAppearances();
        $resultPdf->send('report.pdf', true);
    } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
});
