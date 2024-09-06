<?php

namespace App\Livewire;

use App\Models\TraineeReport;
use Livewire\Component;

class ReportOverview extends Component
{
    public string $testId = "9cd85279-fff9-4d21-87e4-f93e32585769";

    public function render()
    {
        $reports = TraineeReport::all()->toArray();

        return view('livewire.report-overview')->with([
            'language' => "de",
            'title' => "Berichtsheft Dashboard",
            'description' => "Berichtsheft mit Laravel dies das",
            'base_url' => "https://easyberichtsheft-laravel.ddev.site/",
            'api_url' => "https://easyberichtsheft-laravel.ddev.site/api/v1/reports",
            'reports' => $reports
        ]);
    }


    public function testButton()
    {
        dd('testButton');
    }
}
