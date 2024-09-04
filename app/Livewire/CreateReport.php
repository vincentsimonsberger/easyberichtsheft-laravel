<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class CreateReport extends ModalComponent
{
    protected $listeners = ['save' => 'save'];
    public function render()
    {
        return view('livewire.create-report');
    }

    public function save()
    {
        if (true) {
            // Save the report
            session()->flash('success', 'Report created successfully!');
            // $this->closeModal();
        }
        session()->flash('error', 'Report could not be created!');
        session()->flash('info', 'Cool das klappt ja wirklich.');
    }
}
