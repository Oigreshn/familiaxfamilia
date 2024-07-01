<?php

namespace App\Livewire;

use App\Models\Talento;
use Livewire\Component;

class Talentos extends Component
{
    public function render()
    {
        $talentos = Talento::all();

        return view('livewire.talentos', [
            'talentos' => $talentos
        ]);
    }
}

