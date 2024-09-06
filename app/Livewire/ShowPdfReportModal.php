<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class ShowPdfReportModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.show-pdf-report-modal');
    }
}
