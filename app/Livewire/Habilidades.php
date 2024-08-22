<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Habilidad;
use Illuminate\Support\Facades\Auth;

class Habilidades extends Component
{
    public $selectedHabilidades = [];  // Arreglo para almacenar las habilidades seleccionadas

    public function mount()
    {
        // Al iniciar el componente, cargamos las habilidades seleccionadas por el usuario
        $this->selectedHabilidades = Auth::user()->habilidades->pluck('id')->toArray();
    }

    public function actualizarHabilidades()
    {
        // Sincronizar las habilidades seleccionadas con la tabla pivote
        Auth::user()->habilidades()->sync($this->selectedHabilidades);

        // Mostrar un mensaje de éxito
        session()->flash('status', 'Habilidades Actualizadas Exitosamente.');
    }
    
    public function render()
    {
        $habilidades = Habilidad::all();

        return view('livewire.habilidades',[
            'habilidades' => $habilidades
        ]);
    }
}
