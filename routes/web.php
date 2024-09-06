<?php

use App\Helper\Pdf\ReportGenerator;
use App\Models\TraineeReport;
use Illuminate\Support\Facades\Route;
use mikehaertl\pdftk\Pdf;

Route::redirect('/', '/app', 301);

Route::view('/app', 'livewire.report-overview', [
    'reports' => TraineeReport::all()->toArray()
])
    ->middleware(['auth'])
    ->name('app');
Route::view('news', 'news')
    ->middleware(['auth', 'verified'])
    ->name('news');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Export routes
Route::prefix('export')->group(function () {
    /**
     * Export a report by its ID as PDF file
     * example URL: /export/pdf/9cd85279-fff9-4d21-87e4-f93e32585769
     */
    Route::get('pdf/view/{id}', function ($id) {
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
    Route::get('pdf/download/{id}', function ($id) {
        $generator = new ReportGenerator();
        try {
            $report = $generator->generateReport($id);
            $templateFilePath = public_path() . ReportGenerator::PDF_TEMPLATE_FILE_PATH;
            $newPdf = new Pdf($templateFilePath);
            $resultPdf = $newPdf->fillForm($report)->needAppearances();
            $resultPdf->send('report.pdf');
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    });
});

require __DIR__ . '/auth.php';
