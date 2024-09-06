<?php

namespace App\Helper\Pdf;

use App\Models\TraineeReport;
use mikehaertl\pdftk\Pdf;

class ReportGenerator
{
    const PDF_TEMPLATE_FILE_PATH = '/pdf/berichtsheft-form-template.pdf';

    /**
     * Generate a PDF report
     * @param string $id
     * @return array
     * @throws \Exception
     */
    public function generateReport(string $id): array
    {
        /** @var TraineeReport $traineeReport */
        $traineeReport = TraineeReport::findOrFail($id);
        if (!$traineeReport) {
            throw new \Exception("Report not found!");
        }
        $reportData = $traineeReport->getAttributes();
        $preparedData = $this->prepareReportData($reportData);
        return $preparedData;
    }

    /**
     * Get the report data
     * @param string $id
     * @return array
     * @throws \Exception
     */
    public function getReportData(string $id)
    {
        /** @var TraineeReport $traineeReport */
        $traineeReport = TraineeReport::findOrFail($id);
        if (!$traineeReport) {
            throw new \Exception("Report not found!");
        }
        $reportData = $traineeReport->getAttributes();
        return $reportData;
    }


    /**
     * Prepare the report data
     * @param mixed $reportData
     * @return array
     */
    private function prepareReportData($reportData): array
    {
        // Prepare the report data
        $formContent =   [
            'Name desder Auszubildenden' => $reportData['trainee_name'],
            'Ausbildungsjahr' => $reportData['trainee_year'],
            'Ausbildungsbereich' => $reportData['trainee_section'],
            'Ausbildungswoche vom' => $reportData['report_start_date'],
            'bis' => $reportData['report_end_date'],
            'Betriebliche Tätigkeiten Unterweisungen betrieblicher Unterricht sonstige Schulun gen Themen des BerufsschulunterrichtsRow1' => $reportData['report_content_monday'],
            'StundenRow1' => $reportData['report_hours_monday'],
            'Betriebliche Tätigkeiten Unterweisungen betrieblicher Unterricht sonstige Schulun gen Themen des BerufsschulunterrichtsRow2' => $reportData['report_content_tuesday'],
            'StundenRow2' => $reportData['report_hours_tuesday'],
            'Betriebliche Tätigkeiten Unterweisungen betrieblicher Unterricht sonstige Schulun gen Themen des BerufsschulunterrichtsRow3' => $reportData['report_content_wednesday'],
            'StundenRow3' => $reportData['report_hours_wednesday'],
            'Betriebliche Tätigkeiten Unterweisungen betrieblicher Unterricht sonstige Schulun gen Themen des BerufsschulunterrichtsRow4' => $reportData['report_content_thursday'],
            'StundenRow4' => $reportData['report_hours_thursday'],
            'Betriebliche Tätigkeiten Unterweisungen betrieblicher Unterricht sonstige Schulun gen Themen des BerufsschulunterrichtsRow5' => $reportData['report_content_friday'],
            'StundenRow5' => $reportData['report_hours_friday'],
            'Betriebliche Tätigkeiten Unterweisungen betrieblicher Unterricht sonstige Schulun gen Themen des BerufsschulunterrichtsRow6' => $reportData['report_content_saturday'],
            'StundenRow6' => $reportData['report_hours_saturday'],
            'Betriebliche Tätigkeiten Unterweisungen betrieblicher Unterricht sonstige Schulun gen Themen des BerufsschulunterrichtsRow7' => $reportData['report_content_sunday'],
            'StundenRow7' => $reportData['report_hours_sunday'],
        ];
        return $formContent;
    }
}
