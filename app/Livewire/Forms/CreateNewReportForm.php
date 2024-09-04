<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateNewReportForm extends Form
{
    //
    public string $trainee_name;
    public int $trainee_year;
    public string $trainee_section;
    public string $report_start_date;
    public string $report_end_date;
    public string $report_content_monday;
    public float $report_hours_monday;
    public string $report_content_tuesday;
    public float $report_hours_tuesday;
    public string $report_content_wednesday;
    public float $report_hours_wednesday;
    public string $report_content_thursday;
    public float $report_hours_thursday;
    public string $report_content_friday;
    public float $report_hours_friday;
    public string $report_content_saturday;
    public float $report_hours_saturday;
    public string $report_content_sunday;
    public float $report_hours_sunday;
}
