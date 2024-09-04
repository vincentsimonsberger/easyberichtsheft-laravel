<?php

namespace App\Http\Controllers;

use App\Models\TraineeReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
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

    public function testSave(Request $request)
    {
        $formData = $request->getPayload();
        $formDataParameters = $formData->all();
        $report = TraineeReport::create([
            'trainee_name' => $formData->getString('name'),
            'trainee_year' => $formData->getInt('year'),
            'trainee_section' => $formData->getString('area'),
            'report_start_date' => $formData->getString('week_start'),
            'report_end_date' => $formData->getString('week_end'),
            'report_content_monday' => $formDataParameters['monday']['content'],
            'report_hours_monday' => $formDataParameters['monday']['hours'],
            'report_content_tuesday' => $formDataParameters['tuesday']['content'],
            'report_hours_tuesday' => $formDataParameters['tuesday']['hours'],
            'report_content_wednesday' => $formDataParameters['wednesday']['content'],
            'report_hours_wednesday' => $formDataParameters['wednesday']['hours'],
            'report_content_thursday' => $formDataParameters['thursday']['content'],
            'report_hours_thursday' => $formDataParameters['thursday']['hours'],
            'report_content_friday' => $formDataParameters['friday']['content'],
            'report_hours_friday' => $formDataParameters['friday']['hours'],
            'report_content_saturday' => 'frei',
            'report_hours_saturday' => 0,
            'report_content_sunday' => 'frei',
            'report_hours_sunday' => 0,
        ]);
        return response()->json($formDataParameters, 201);  // Return the created report
    }
}
