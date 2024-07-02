<section>
    <header>
        <h2 class="text-2xl font-bold text-center underline">
            {{ __('Crea tu Avatar') }}
        </h2>

        <p class="text-1xl font-semibold text-center">
            {{ __("Debes seleccionar una imagen para crear tu Avatar") }}
        </p>
    </header>

    <form method="post" action="" class="mt-6 space-y-6" novalidate>
        @csrf
        @method('patch')

        <!-- MUESTRA LAS HABILIDADES DE LAS TABLAS -->
        
        
        <div class="flex items-center justify-center gap-4">
            <x-primary-button>{{ __('Actualizar Avatar') }}</x-primary-button>
        </div>    

        <div class="flex items-center justify-center">
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-gray-600"
                >{{ __('Actualizando Avatar a tu Perfil.') }}</p>
            @endif
        </div>
    </form>
</section>