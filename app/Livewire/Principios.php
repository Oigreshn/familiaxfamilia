<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Principio;
use Illuminate\Support\Facades\Auth;

class Principios extends Component
{
    public $selectedPrincipios = [];  // Arreglo para almacenar los Principios seleccionadas

    public function mount()
    {
        // Al iniciar el componente, cargamos los talentos seleccionadas por el usuario
        $this->selectedPrincipios = Auth::user()->principios->pluck('id')->toArray();
    }

    public function actualizarPrincipios()
    {
        // Sincronizar los talentos seleccionadas con la tabla pivote
        Auth::user()->principios()->sync($this->selectedPrincipios);

        // Mostrar un mensaje de éxito
        session()->flash('status', 'Principios Actualizados Exitosamente.');
    }

    public function render()
    {
        $principios = Principio::all();
        
        return view('livewire.principios', [
            'principios' => $principios
        ]);
    }
}