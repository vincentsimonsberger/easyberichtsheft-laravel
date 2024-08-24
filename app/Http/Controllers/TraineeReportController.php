<?php
namespace App\Http\Controllers;

use App\Models\TraineeReport;
use Illuminate\Http\Request;

class TraineeReportController extends Controller
{
    public function index()
    {
        return TraineeReport::all();  // Get all reports
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'trainee_name' => 'required|string',
            'trainee_year' => 'required|integer',
            'trainee_section' => 'required|string',
            'report_start_date' => 'required|date',
            'report_end_date' => 'required|date',
            'report_content_monday' => 'string|nullable',
            'report_hours_monday' => 'integer|nullable',
            'report_content_tuesday' => 'string|nullable',
            'report_hours_tuesday' => 'integer|nullable',
            'report_content_wednesday' => 'string|nullable',
            'report_hours_wednesday' => 'integer|nullable',
            'report_content_thursday' => 'string|nullable',
            'report_hours_thursday' => 'integer|nullable',
            'report_content_friday' => 'string|nullable',
            'report_hours_friday' => 'integer|nullable',
            'report_content_saturday' => 'string|nullable',
            'report_hours_saturday' => 'integer|nullable',
            'report_content_sunday' => 'string|nullable',
            'report_hours_sunday' => 'integer|nullable',
            // Add validation rules for other fields
        ]);

        $report = TraineeReport::create($validated);

        return response()->json($report, 201);  // Return the created report
    }

    public function show($id)
    {
        return TraineeReport::findOrFail($id);  // Get a single report by ID
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'trainee_name' => 'sometimes|required|string',
            'trainee_year' => 'sometimes|required|integer',
            'trainee_section' => 'sometimes|required|string',
            'report_start_date' => 'sometimes|required|date',
            'report_end_date' => 'sometimes|required|date',
            // Add validation rules for other fields
        ]);

        $report = TraineeReport::findOrFail($id);
        $report->update($validated);

        return response()->json($report, 200);  // Return the updated report
    }

    public function destroy($id)
    {
        $report = TraineeReport::findOrFail($id);
        $report->delete();

        return response()->json(null, 204);  // Return a no-content response
    }
}
