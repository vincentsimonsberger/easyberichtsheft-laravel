<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TraineeReport extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'trainee_name',
        'trainee_year',
        'trainee_section',
        'report_start_date',
        'report_end_date',
        'report_content_monday',
        'report_hours_monday',
        'report_content_tuesday',
        'report_hours_tuesday',
        'report_content_wednesday',
        'report_hours_wednesday',
        'report_content_thursday',
        'report_hours_thursday',
        'report_content_friday',
        'report_hours_friday',
        'report_content_saturday',
        'report_hours_saturday',
        'report_content_sunday',
        'report_hours_sunday'
    ];

    protected $casts = [
        'report_start_date' => 'datetime',
        'report_end_date' => 'datetime',
    ];
}
