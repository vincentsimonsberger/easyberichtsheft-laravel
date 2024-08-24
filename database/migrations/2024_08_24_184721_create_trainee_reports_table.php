<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineeReportsTable extends Migration
{
    public function up(): void
    {
        Schema::create('trainee_reports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('trainee_name');
            $table->integer('trainee_year');
            $table->string('trainee_section');
            $table->date('report_start_date');
            $table->date('report_end_date');
            $table->string('report_content_monday')->nullable();
            $table->integer('report_hours_monday')->nullable();
            $table->string('report_content_tuesday')->nullable();
            $table->integer('report_hours_tuesday')->nullable();
            $table->string('report_content_wednesday')->nullable();
            $table->integer('report_hours_wednesday')->nullable();
            $table->string('report_content_thursday')->nullable();
            $table->integer('report_hours_thursday')->nullable();
            $table->string('report_content_friday')->nullable();
            $table->integer('report_hours_friday')->nullable();
            $table->string('report_content_saturday')->nullable();
            $table->integer('report_hours_saturday')->nullable();
            $table->string('report_content_sunday')->nullable();
            $table->integer('report_hours_sunday')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trainee_reports');
    }
}
