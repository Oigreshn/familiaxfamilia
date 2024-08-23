<section class="flex flex-col md:flex-row space-y-6 md:space-y-0">
    <!-- Contenido principal al lado izquierdo de la imagen en pantallas medianas y grandes -->
    <div class="md:w-2/3 lg:w-3/4 md:pr-6 space-y-6">
        <!-- Encabezado con logo, línea vertical, título y descripción -->
        <header class="flex flex-col md:flex-row items-center md:space-x-6 p-4 bg-white rounded-lg shadow">
            <div class="flex-shrink-0 mb-4 md:mb-0">
                <img src="{{ asset('images/principios.png') }}" alt="Logo Principios" class="h-16 w-16">
            </div>
            <div class="border-l-4 border-gray-300 pl-6">
                <h2 class="text-xl sm:text-2xl font-bold underline mb-2">
                    {{ __('PRINCIPIOS') }}
                </h2>
                <p class="text-sm sm:text-md font-semibold">
                    {{ __("Son reglas fundamentales que guian el comportamiento ético y moral de las personas.") }}
                </p>
            </div>
        </header>

        <!-- Colocar la imagen justo después del encabezado en pantallas pequeñas -->
        <div class="block md:hidden w-full justify-center mt-4">
            <img src="{{ asset('images/fondoprincipios.png') }}" alt="Imagen Principios" 
                 class="w-full h-auto object-cover rounded-lg shadow-lg">
        </div>

        <form wire:submit.prevent="actualizarPrincipios" class="mt-6 space-y-6" novalidate>
            @csrf
            @method('patch')

            <!-- MUESTRA LOS PRINCIPIOS DE LAS TABLAS -->
            <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Principios -->
                @foreach ($principios as $principio)
                <div class="bg-white rounded-lg shadow flex items-center p-3 h-20">
                    <label class="inline-flex items-center w-full">
                        <input type="checkbox" wire:model="selectedPrincipios" value="{{ $principio->id }}"
                            class="form-checkbox h-5 w-5 text-yellow-500 border-yellow-500 bg-transparent rounded">
                        <span class="ml-2 text-gray-700 font-bold text-base">{{ $principio->descripcion }}</span>
                    </label>
                </div>
                @endforeach
            </div>

            <!-- Botón Actualizar Talentos -->
            <div class="flex items-center justify-center mt-8 md:col-span-2">
                <x-primary-button class="px-6 py-2 text-lg">{{ __('Actualizar Principios') }}</x-primary-button>
            </div>

            <!-- Mensaje de estado -->
            <div class="md:col-span-2 flex items-center justify-center">
                @if (session('status'))
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                    class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
                        {{ session('status') }}
                    </p>
                @endif
            </div>
        </form>
    </div>
    <!-- Contenedor de la imagen, visible al lado derecho en pantallas medianas y grandes -->
    <div class="hidden md:flex md:w-1/3 lg:w-1/4 items-center justify-center">
        <img src="{{ asset('images/fondoprincipios.png') }}" alt="Imagen Principios" 
             class="md:max-h-[600px] lg:max-h-[650px] w-auto object-contain rounded-lg shadow-lg">
    </div>
</section>
