<?php

namespace App\Http\Livewire;

use App\Models\Mbranch;
use App\Models\Mregion;
use Livewire\Component;

class SelectOffline extends Component
{
    public $regionals;
    public $branch;

    public $selectedRegion = null;

    public function mount()
    {
        $this->regionals = Mregion::all();
        $this->branch = collect();
    }

    public function render()
    {
        return view('livewire.select-offline');
    }

    public function updatedSelectedRegion($regional)
    {
        if (!is_null($regional)) {
            $this->branch = Mbranch::where('mregionfk', $regional)->get();
        }
    }
}