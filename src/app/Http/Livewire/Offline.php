<?php

namespace App\Http\Livewire;

use App\Models\Mbranch;
use App\Models\Mregion;
use Livewire\Component;

class Offline extends Component
{
    public $selectedMregion = null;
    public $selectedMbranches = null;
    public $mbranches = [];

    public function render()
    {
        if (!empty($this->selectedMregion)) {
            $this->mbranches = Mbranch::where('mregionfk', $this->selectedMregion)->get();
        }

        return view('livewire.offline', [
            'mregions' => Mregion::all(),
        ]);
    }

    //public function updateSelectedMregion($mregionfk)
    //{
    //    $this->mbranches = Mbranch::where('mregionfk', $mregionfk)->get();
    //}
}