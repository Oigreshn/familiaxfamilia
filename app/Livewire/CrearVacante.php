<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $categoria;
    public $entidad;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'categoria' => 'required',
        'entidad' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'nullable|image|max:5120',
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        //Almacenar la Imagen
        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = $nombre_imagen = str_replace('public/vacantes/','',$imagen);
        
        //Crear la Vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'categoria' => $datos['categoria'],
            'entidad' => $datos['entidad'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        //Crear un mensaje
        session()->flash('mensaje', 'La Oportunidad se publicó Correctamente');

        //Redireccionar al Usuario
        return redirect()->route('vacantes.index');
    }
    public function render()
    {
        //Consultar DB
        //$variables = Modelo::all();
        //Ver agenda
        return view('livewire.crear-vacante');
    }
}
