<?php
namespace App\Livewire\Batches;

use Livewire\Component;
use App\Models\Batch;

class Index extends Component
{
    public function render()
    {
        $batches = Batch::orderBy('start_date','desc')->get();
        return view('livewire.batches.index', compact('batches'))->layout('layouts.app');
    }
}
