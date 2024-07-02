<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
     
    <!-- INGRESO DE TITUTLO DE OPORTUNIDAD -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo de Oportunidad')" />
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" 
            :value="old('titulo')" 
            placeholder="Titulo de Oportunidad"
        />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

     <!-- INGRESO CATEGORIA -->
     <div>
        <x-input-label for="rol" :value="__('Categoria')" />
        
        <select wire:model="categoria" id="categoria" 
        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 
        rounded-md shadow-sm">               

            <option value="">--Selecciona una Categoria--</option>
            <option value="1">CATEGORIA 1</option>
            <option value="2">CATEGORIA 2</option>
            
        </select>

        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>

    <!-- INGRESO DE ENTIDAD -->
    <div>
        <x-input-label for="" :value="__('Nombre de Entidad')" />
        <x-text-input 
            id="entidad" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="entidad" 
            :value="old('entidad')" 
            placeholder="Nombre de la Entidad que Ofrece la Oportunidad"
        />
        <x-input-error :messages="$errors->get('entidad')" class="mt-2" />
    </div>

    <!-- ULTIMO DIA DE POSTULACION -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo Día de Postulacion')" />
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')" 
        />
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <!-- DESCRIPCION DE LA OPORTUNIDAD -->
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion de Oportunidad')" />
        <textarea 
            wire:model="descripcion" 
            placeholder="Haz una descripción de la oportunidad que estas Ofreciendo"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500
             focus:ring-opacity-50 w-full h-72">
        </textarea>
        <x-input-error class="mt-2" :messages="$errors->get('descripcion')" />
    </div>

    <!-- INGRESO DE IMAGEN O ARCHIVO --> 
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagen_nueva" 
            accept="image/*"
        />

        <div class="my-5 w-80">
            <x-input-label :value="__('Imagen Actual')" />
            <img src=" {{ asset('storage/vacantes/' . $imagen) }}" alt="{{ 'Imagen Vacante' . $titulo }}">
        </div>    

        <div class="my-5 w-80">
            @if ($imagen_nueva)
                <x-input-label :value="__('Imagen Nueva')" />
                <img src="{{ $imagen_nueva->temporaryUrl() }}" >
            @endif
        </div>

        <x-input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />
    </div>

    <x-primary-button>{{ __('Guardar Cambios') }}</x-primary-button>
</form>