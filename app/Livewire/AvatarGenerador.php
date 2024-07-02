<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Avatar;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;



class AvatarGenerador extends Component
{
    use WithFileUploads;

    public $image;
    public $avatarUrl;

    public function render()
    {
        return view('livewire.avatar-generador');
    }

    public function generateAvatar()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Guardar la imagen subida en el almacenamiento público
        $imagePath = $this->image->store('avatars', 'public');

        // Procesar la imagen usando Intervention Image
        $img = Image::make(public_path("images/avatar/{$imagePath}"))->fit(300, 300);
        $img->save(public_path("images/avatar/procesados/{$imagePath}"));

        // Generar URL del avatar usando RoboHash (o cualquier otra fuente)
        $response = Http::get("https://robohash.org/{$imagePath}");

        if ($response->successful()) {
            $this->avatarUrl = $response->url();
        } else {
            $this->avatarUrl = null;
            session()->flash('error', 'Error generando el avatar. Intenta nuevamente.');
        }
    }
}
