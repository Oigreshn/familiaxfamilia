<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $categoria;
    public $entidad;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'categoria' => 'required',
        'entidad' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:5120'
    ];


    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->categoria = $vacante->categoria;
        $this->entidad = $vacante->entidad;
        $this->ultimo_dia = Carbon::parse( $vacante->ultimo_dia )->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante()
    {
        $datos = $this->validate();

        //Si hay una nueva Imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }

        //Encontrar la Oportunidad a Editar
        $vacante = Vacante::find($this->vacante_id);

        //Asignar los valores
        $vacante->titulo = $datos['titulo'];
        $vacante->categoria = $datos['categoria'];
        $vacante->entidad = $datos['entidad'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

        //Guardar la vacante
        $vacante->save();

        //Redireccionar
        session()->flash('mensaje','La Oportunidad se actualizó Correctamente');
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        return view('livewire.editar-vacante');
    }
}
