<section class="md:w-full space-y-5"> 
    <header class="text-center mb-10">
        <div class="flex justify-center items-center mb-4">
            <img src="{{ asset('images/habilidades.png') }}" alt="Icono Habilidades" class="h-16 w-16">
        </div>
        <h2 class="text-2xl font-bold underline">
            {{ __('Habilidades') }}
        </h2>
        <p class="text-xl font-semibold">
            {{ __('Selecciona tus habilidades') }}
        </p>
    </header>

    <form wire:submit.prevent="actualizarHabilidades" class="md:w-full space-y-5">
        @csrf

        <!-- Muestra las habilidades de las tablas -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">
            @foreach ($habilidades as $index => $habilidad)
                <div class="relative bg-cover bg-center rounded-lg shadow-md p-4 text-white" style="background-image: url('{{ asset('images/habilidad' . ($index + 1) . '.png') }}'); height: 250px; width: 200px;">
                    <label class="inline-flex items-start">
                        <input type="checkbox" wire:model="selectedHabilidades" value="{{ $habilidad->id }}" 
                               class="form-checkbox h-5 w-5 text-yellow-500 border-yellow-500 bg-transparent rounded">
                        <span class="ml-2 text-xl font-bold">{{ $habilidad->habilidad }}</span>
                    </label>
                    <div class="mt-2 text-center text-sm">{{ $habilidad->descripcion }}</div>
                    <div class="absolute top-0 left-0 w-full h-1 bg-amber-500 rounded-t-lg"></div>
                </div>
            @endforeach
        </div>

        <div class="flex items-center justify-center mt-8">
            <x-primary-button class="px-6 py-2 text-lg">{{ __('Actualizar Habilidades') }}</x-primary-button>
        </div>

        <div class="md:col-span-2 flex items-center justify-center">
            @if (session('status'))
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                   class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
                    {{ session('status') }}
                </p>
            @endif
        </div>
    </form>
</section>
