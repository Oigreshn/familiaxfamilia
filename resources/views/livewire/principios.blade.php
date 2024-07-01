<section>
    <header>
        <h2 class="text-2xl font-bold text-center underline">
            {{ __('Principios') }}
        </h2>

        <p class="text-1xl font-semibold text-justify">
            {{ __("Son reglas fundamentales que guían el comportamiento ético y moral de las personas.") }}
        </p>
    </header>

    <form method="post" action="" class="mt-6 space-y-6" novalidate>
        @csrf
        @method('patch')

         <!-- MUESTRA LOS PRINCIPIOS DE LAS TABLAS -->
         <div>
            @foreach ($principios as $principio)
            <div class="mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="principios[]" value="{{ $principio->id }}" class="form-checkbox">
                    <span class="ml-2 text-gray-700 font-bold">{{ $principio->descripcion }}</span>
                </label>
            </div>
            @endforeach
            
        </div>
        
        <div class="flex items-center justify-center gap-4">
            <x-primary-button>{{ __('Actualizar Principios') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-gray-600"
                >{{ __('Actualizando Principios.') }}</p>
            @endif
        </div>
    </form>
</section>
