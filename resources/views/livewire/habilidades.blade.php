<section>
    <header>
        <h2 class="text-2xl font-bold text-center underline">
            {{ __('Habilidades') }}
        </h2>

        <p class="text-1xl font-semibold text-center">
            {{ __("Selecciona tus habilidades") }}
        </p>
    </header>

    <form method="post" action="" class="mt-6 space-y-6" novalidate>
        @csrf
        @method('patch')

        <!-- MUESTRA LAS HABILIDADES DE LAS TABLAS -->
        <div>
            @foreach ($habilidades as $habilidad)
                <div class="mt-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="habilidades[]" value="{{ $habilidad->id }}" class="form-checkbox">
                        <span class="ml-2 text-gray-700 font-bold">{{ $habilidad->habilidad }}</span>
                    </label>
                    <div class="ml-6 text-gray-600 text-justify">{{ $habilidad->descripcion }}</div>
                </div>
            @endforeach
        </div>

        
        <div class="flex items-center justify-center gap-4">
            <x-primary-button>{{ __('Actualizar Habilidades') }}</x-primary-button>
        </div>    

        <div class="flex items-center justify-center">
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-gray-600"
                >{{ __('Actualizando Habilidades.') }}</p>
            @endif
        </div>
    </form>
</section>
