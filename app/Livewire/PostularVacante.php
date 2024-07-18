<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
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

        // Validar si la fecha de cierre ya pasó a partir de la columna ultimo_dia
        if($this->vacante->ultimo_dia < now()) {
            session()->flash('mensaje', 'La fecha de postulación para esta oportunidad ha expirado.');
            return redirect()->back();
        }

        // validar que el usuario no haya postulado a la vacante anteriormente
        if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0) {
            session()->flash('mensaje', 'Ya enviaste tu postulación para esta vacante previamente.');
            return redirect()->back();
        } 

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
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));


        //Mostrar el Usuario un mensaje de OK
        session()->flash('mensaje', 'Gracias por enviarnos tu información. ¡Te deseamos mucho éxito!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
