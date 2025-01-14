<div class="md:w-full space-y-5">
    <header class="text-center mb-10">
        <div class="flex justify-center items-center mb-4">
            <img src="{{ asset('images/organizaciones.png') }}" alt="Icono Organizaciones" class="h-16 w-16">
        </div>
        <h2 class="font-nexabold text-2xl font-bold underline">
            {{ __('Gestionar Organizaciones') }}
        </h2>
        <p class="font-nexalight text-lg text-gray-700 mt-2">
            ¡Crea, edita o selecciona una organización existente!
        </p>
    </header>

    <!-- Buscar Organización -->
    <form wire:submit.prevent='leerDatosFormulario'>
        <div class="flex justify-center items-center mb-6">
            <x-text-input 
                id="buscar"
                type="text" 
                placeholder="Buscar organización..." 
                wire:model="buscar" 
                :value="old('buscar')" 
                class="border rounded-lg p-3 w-3/4 sm:w-1/2"
            />
        </div>
    </form>

    <!-- Lista de Organizaciones -->
    <div class="font-museo300 flex justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full px-6">
            @forelse($organizations as $organization)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ $organization->imagen ? asset('storage/' . $organization->imagen) : asset('images/perfil_ong.png') }}" 
                        alt="Imagen de la Organización" 
                        class="h-40 w-full object-cover">
                    <div class="p-4">
                        <h3 class="font-nexabold text-lg text-gray-800">{{ $organization->nombre }}</h3>
                        <p class="font-nexalight text-sm text-gray-600">{{ Str::limit($organization->descripcion, 100) }}</p>
                        <div class="flex gap-2 mt-4">
                            <!-- Botón Seleccionar -->
                            <x-primary-button 
                                wire:click="addOrganizationToUser({{ $organization->id }})" 
                                class="bg-indigo-500 text-white px-4 py-2 rounded w-full">
                                {{ __('Seleccionar') }}
                            </x-primary-button>

                            <!-- Botón Editar -->
                            <x-secondary-button 
                                wire:click="loadOrganizationData({{ $organization->id }})" 
                                class="bg-amber-500 text-white px-4 py-2 rounded w-full">
                                {{ __('Editar') }}
                            </x-secondary-button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-4 text-gray-500 col-span-full text-center">
                    {{ __('No se encontraron organizaciones.') }}
                </div>
            @endforelse
        </div>
    </div>

    <!-- Formulario para Crear/Editar Organización -->
    <form wire:submit.prevent="createOrAttachOrganization" class="mt-10 px-6">
        @csrf
        <div class="grid md:grid-cols-2 gap-6">
            <div class="flex flex-col space-y-2">
                <div class="flex items-center">
                    <x-input-label for="nombre" :value="__('Nombre de la Organización')" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 text-red-600" viewBox="0 0 24 24" role="img" aria-label="Campo obligatorio">
                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8zm-1-7h2v2h-2zm0-8h2v6h-2z" />
                    </svg>
                </div>
                <x-text-input id="nombre" name="nombre" type="text"
                        wire:model="nombre"
                        class="border rounded-lg w-full p-3"
                        placeholder="Nombre de tu Organización" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>
            
            <div class="flex flex-col space-y-2">
                <div class="flex items-center">
                    <x-input-label for="cif" :value="__('CIF')" />
                     <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 ml-1 text-red-600" viewBox="0 0 24 24" role="img" aria-label="Campo obligatorio">
                          <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8zm-1-7h2v2h-2zm0-8h2v6h-2z"/>
                     </svg>
                </div>           
                <x-text-input id="cif" name='cif' type="text"      
                    wire:model="cif" 
                    class="border rounded-lg w-full p-3"
                    placeholder="Código de Identificación Fiscal"
                />
                <x-input-error :messages="$errors->get('cif')" class="mt-2" />
            </div>

            <div class="col-span-full">
                <x-input-label for="descripcion" :value="__('Descripción de Organización')" />
                <textarea id="descripcion" name="descripcion"
                    wire:model="descripcion" 
                    placeholder="Describe a tu Organización"
                    class="border rounded-lg w-full p-3">
                </textarea>
            </div>

            <div>
                <x-input-label for="web" :value="__('Dirección de Página Web')" />
                <x-text-input 
                    type="text"    
                    id="web"  
                    wire:model="web" 
                    class="border rounded-lg w-full p-3"
                    placeholder="URL del Sitio Web de tu Organización"
                 />
            </div>

            <div>
                <x-input-label for="imagen" :value="__('Perfil de la Organización')" />
                <div class="relative group flex justify-center items-center mb-4">
                    @if ($imagen)
                        <img src="{{ $imagen->temporaryUrl() }}" alt="Vista previa" class="h-full w-40 object-contain rounded-lg border">
                    @elseif ($selectedOrganization && $currentImage)
                        <img src="{{ asset('storage/' . $currentImage) }}" alt="Imagen actual" class="h-full w-40 object-contain rounded-lg border">
                    @else
                        <img src="{{ asset('images/perfil_ong.png') }}" alt="Imagen predeterminada" class="h-full w-40 object-contain rounded-lg border">
                    @endif

                    <!-- Botón para cambiar imagen -->
                    <button type="button" onclick="document.getElementById('imagen').click()"
                            class="absolute inset-0 bg-gray-900 bg-opacity-50 text-white text-sm opacity-0 group-hover:opacity-100 flex items-center justify-center rounded-lg">
                        {{ __('Cambiar') }}
                    </button>
                </div>
                <input type="file" accept="image/*" id="imagen" wire:model="imagen" class="hidden">
                <x-input-error :messages="$errors->get('imagen')" class="mt-2" />

                @if ($selectedOrganization && $currentImage)
                    <button wire:click.prevent="deleteImage" class="text-red-600 font-nexabold hover:underline">
                        {{ __('Eliminar Imagen') }}
                    </button>
                @endif
            </div>
        </div>

        <div class="flex items-center justify-center mt-8">
            @if ($selectedOrganization)
                <x-primary-button type="submit" class="bg-indigo-500 text-white px-6 py-3 rounded-lg">
                    {{ __('Editar') }}
                </x-primary-button> 
        
                <x-danger-button 
                    wire:click="deleteOrganization" 
                    class="ml-4 bg-red-500 text-white px-6 py-3 rounded-lg">
                    {{ __('Eliminar') }}
                </x-danger-button>
            @else
                <x-primary-button type="submit" class="bg-amber-500 text-white px-6 py-3 rounded-lg">
                    {{ __('Guardar') }}
                </x-primary-button>
            @endif
        </div>        
    </form>

    {{-- Organizacion Vinculadas --}}
    <div class="mt-8">
        <h3 class="font-nexabold text-lg mb-4">{{ __('Tus organizaciones') }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if(Auth::check() && Auth::user()->organizaciones->isNotEmpty())
                @foreach(Auth::user()->organizaciones as $organizacion)
                    <div class="bg-gray-100 rounded-lg p-2 mb-2 flex items-center justify-between">
                        <div>
                            <h3 class="font-nexabold text-sm text-gray-800">{{ $organizacion->nombre }}</h3>
                            <p class="text-gray-600 font-nexalight text-xs">{{ $organizacion->cif }}</p>
                            <p class="text-gray-600 font-nexalight text-xs">{{ $organizacion->descripcion }}</p>
                        </div>
                        <button wire:click="detachOrganizacion({{ $organizacion->id }})" class="text-red-600 hover:underline text-sm">
                            {{ __('Eliminar') }}
                        </button>
                    </div>
                @endforeach
            @else
                <p class="text-gray-500 text-sm">{{ __('No tienes organizaciones asociadas.') }}</p>
            @endif
        </div>
    </div>
</div>

@push('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.addEventListener('alert', event => {
                // Asegúrate de acceder al primer elemento del array si es necesario
                const alertData = Array.isArray(event.detail) ? event.detail[0] : event.detail;

                // Tipos de alerta permitidos
                const alertTypes = ['success', 'error', 'warning', 'info'];
                const alertType = alertTypes.includes(alertData?.type) ? alertData.type : 'error';

                Swal.fire({
                    title: getAlertTitle(alertType),
                    text: alertData?.message || 'Ha ocurrido un error.',
                    icon: alertType,
                    confirmButtonText: alertData?.confirmButtonText || 'Entendido'
                });
            });

            /**
             * Función para obtener el título basado en el tipo de alerta.
             * @param {string} type - Tipo de alerta ('success', 'error', 'warning', 'info')
             * @returns {string} - Título correspondiente.
             */
            function getAlertTitle(type) {
                switch (type) {
                    case 'success':
                        return '¡Éxito!';
                    case 'warning':
                        return 'Advertencia';
                    case 'info':
                        return 'Información';
                    case 'error':
                    default:
                        return 'Error';
                }
            }
        });
    </script>
@endpush
