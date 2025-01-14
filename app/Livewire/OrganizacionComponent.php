<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Organizacion;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrganizacionComponent extends Component 
{
    use WithFileUploads;

    public $nombre = '';
    public $cif = '';
    public $descripcion = '';
    public $web = '';
    public $imagen = null;
    public $buscar = '';
    public $selectedOrganization = null;
    public $currentImage = null;

    public function leerDatosFormulario()
    {
        $this->dispatch('terminosBusqueda', $this->buscar);
    }

    public function createOrAttachOrganization()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'cif' => 'required|string|max:255|unique:organizacion,cif,' . ($this->selectedOrganization ?? 'null'),
            'descripcion' => 'nullable|string',
            'web' => 'nullable',
            'imagen' => 'nullable|image|max:5120', // 5MB
        ]);

        if ($this->selectedOrganization) {
            $organization = Organizacion::find($this->selectedOrganization);
        
            if ($organization) {
                // Actualización de la organización
                $organization->update([
                    'nombre' => $this->nombre,
                    'cif' => $this->cif,
                    'descripcion' => $this->descripcion,
                    'web' => $this->web,
                    'imagen' => $this->imagen ? $this->imagen->store('organizaciones', 'public') : $this->currentImage,
                ]);
        
                // Vincula el usuario actual
                if (!$organization->users()->where('user_id', Auth::id())->exists()) {
                    $organization->users()->attach(Auth::id());
                }
        
                $this->dispatch('alert', [
                    'type' => 'success',
                    'message' => 'Organización actualizada con éxito.',
                ]);
            } else {
                $this->dispatch('alert', [
                    'type' => 'error',
                    'message' => 'No se pudo encontrar la organización seleccionada para actualizar.',
                ]);
            }
        } else {
            // Creación de una nueva organización
            $organization = Organizacion::create([
                'nombre' => $this->nombre,
                'cif' => $this->cif,
                'descripcion' => $this->descripcion,
                'web' => $this->web,
                'imagen' => $this->imagen ? $this->imagen->store('organizaciones', 'public') : null,
            ]);
        
            $organization->users()->attach(Auth::id());
        
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Organización creada con éxito.',
            ]);
        }
        
        $this->resetForm();
        
    }

    public function selectOrganization($id)
    {
        $organization = Organizacion::findOrFail($id);

        $this->selectedOrganization = $organization->id;
        $this->nombre = $organization->nombre;
        $this->cif = $organization->cif;
        $this->descripcion = $organization->descripcion;
        $this->web = $organization->web;
        $this->currentImage = $organization->imagen;
        $this->imagen = null; // Limpia imagen en caso de edición
    }


    public function deleteImage()
    {
        if ($this->currentImage) {
            Storage::disk('public')->delete($this->currentImage);
            $this->currentImage = null;
            Organizacion::where('id', $this->selectedOrganization)->update(['imagen' => null]);
            session()->flash('success', 'Imagen eliminada correctamente.');
        }
    }

    public function resetForm()
    {
        $this->nombre = '';
        $this->cif = '';
        $this->descripcion = '';
        $this->web = '';
        $this->imagen = null;
        $this->buscar = '';
        $this->selectedOrganization = null;
        $this->currentImage = null;
    }

    public function loadOrganizationData($organizationId)
    {
        $organization = Organizacion::find($organizationId);

        if ($organization) {
            $this->selectedOrganization = $organization->id;
            $this->nombre = $organization->nombre;
            $this->cif = $organization->cif;
            $this->descripcion = $organization->descripcion;
            $this->web = $organization->web;
            $this->currentImage = $organization->imagen; // Para manejar la imagen existente
            $this->imagen = null; // Resetear para evitar conflictos con uploads nuevos

            $this->dispatch('alert', [
                'type' => 'info',
                'message' => 'Datos de la organización cargados para edición.',
            ]);

        } else {
            $this->dispatch('alert', [
                'type' => 'error',
                'message' => 'No se pudo encontrar la organización seleccionada.',
            ]);
        }

        $this->dispatch('organization-loaded');
    }

    public function addOrganizationToUser($organizationId)
    {
        $organization = Organizacion::find($organizationId);

        if (!$organization) {
            $this->dispatch('alert', [
                'type' => 'error',
                'message' => 'La organización no existe.',
            ]);
            return;
        }

        // Verifica si el usuario ya tiene esta organización vinculada
        if ($organization->users()->where('user_id', Auth::id())->exists()) {
            $this->dispatch('alert', [
                'type' => 'warning',
                'message' => 'Esta organización ya está vinculada a tu cuenta.',
            ]);
            return;
        }

        // Vincula el usuario actual
        $organization->users()->attach(Auth::id());

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Organización vinculada con éxito.',
        ]);

    }

    public function searchOrganizations()
    {
        return Organizacion::where('nombre', 'like', '%' . $this->buscar . '%')
            ->get();
    }

    //Desvincula Organizacion del Usuario
    public function detachOrganizacion($id)
    {
        $organization = Organizacion::find($id);

        if ($organization) {
            $organization->users()->detach(Auth::id());

            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Organización desvinculada correctamente',
            ]);
        }

        $this->resetForm();
    }

    public function deleteOrganization()
    {
        $organization = Organizacion::findOrFail($this->selectedOrganization);

        if ($organization->users()->count() <= 1) {
            $organization->delete();
           
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Organización eliminada correctamente.',
            ]);
        } else {
            
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'No puedes eliminar una organización vinculada con otros usuarios.',
            ]);
        }

        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.organizacion', [
            'organizations' => $this->searchOrganizations(), 
        ]);
    }
}  