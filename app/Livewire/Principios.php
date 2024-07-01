<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Principio;

class Principios extends Component
{
    public function render()
    {
        $principios = Principio::all();
        
        return view('livewire.principios', [
            'principios' => $principios
        ]);
    }
}