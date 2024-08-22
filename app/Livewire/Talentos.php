<?php

namespace App\Livewire;
 
use App\Models\Talento;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Talentos extends Component
{
    public $selectedTalentos = [];  // Arreglo para almacenar los talentos seleccionadas

    public function mount()
    {
        // Al iniciar el componente, cargamos los talentos seleccionadas por el usuario
        $this->selectedTalentos = Auth::user()->talentos->pluck('id')->toArray();
    }

    public function actualizarTalentos()
    {
        // Sincronizar los talentos seleccionadas con la tabla pivote
        Auth::user()->talentos()->sync($this->selectedTalentos);

        // Mostrar un mensaje de éxito
        session()->flash('status', 'Talentos Actualizados Exitosamente.');
    }

    public function render()
    {
        $talentos = Talento::all();

        return view('livewire.talentos', [
            'talentos' => $talentos
        ]);
    }
}

