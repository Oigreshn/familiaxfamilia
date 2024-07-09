<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        //Almacenar CV en el Disco Duro
        if ($this->cv){
            $cv = $this->cv->store('public/cv');
            $datos['cv'] = $nombre_imagen = str_replace('public/cv/','',$cv);
        }

        //Crear el Candidato a la  Vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        //Crear notificación y enviar el email

        //Mostrar el Usuario un mensaje de OK
        session()->flash('mensaje', 'Gracias por enviarnos tu información. ¡Te deseamos mucho éxito!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
