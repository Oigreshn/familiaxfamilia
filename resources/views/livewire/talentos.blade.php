<section>
    <header>
        <h2 class="text-2xl font-bold text-center underline">
            {{ __('Talentos') }}
        </h2>

        <p class="text-1xl font-semibold text-justify">
            {{ __("Son habilidades naturales o adquiridas que destacan las capacidades 
                    únicas de una persona en diversas áreas específicas.") }}
        </p>
    </header>

    <form method="post" action="" class="mt-6 space-y-6" novalidate>
        @csrf
        @method('patch')

         <!-- MUESTRA LAS TALENTOS DE LAS TABLAS -->
         <div class="md:grid md:grid-cols-2  bg-gray-50 p-4 my-10">
            @foreach ($talentos as $talento)
            <div class="mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="talentos[]" value="{{ $talento->id }}" class="form-checkbox">
                    <span class="ml-2 text-gray-700 font-bold">{{ $talento->descripcion }}</span>
                </label>
            </div>
            @endforeach
            
        </div>
        
        <div class="flex items-center justify-center gap-4">
            <x-primary-button>{{ __('Actualizar Talentos') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-gray-600"
                >{{ __('Actualizado Talentos.') }}</p>
            @endif
        </div>
    </form>
</section>
