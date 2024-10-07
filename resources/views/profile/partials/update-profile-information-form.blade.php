<header class="text-center mb-10"> <!-- Aumentamos el margen inferior -->
    <div class="flex justify-center items-center mb-4">
        <img src="{{ asset('images/datospersonales.png') }}" alt="Icono Datos Personales" class="h-16 w-16">
    </div>
    <h2 class="text-2xl font-bold">
        {{ __('Datos Personales') }}
    </h2>
    <p class="text-md font-semibold">
        {{ __('Actualice la Información de su Perfil') }}
    </p>
</header>


<!-- Formulario de Actualización -->
<form method="post" action="{{ route('profile.update') }}" class="md:w-full space-y-5" novalidate>
    @csrf
    @method('patch')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Nombre Completo -->
        <div>
            <x-input-label for="name" :value="__('Nombre Completo')" />
            <x-text-input id="name" name="name" type="text" 
                            class="mt-1 block w-full" :value="old('name', $user->name)" 
                            required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Móvil -->
        <div>
            <x-input-label for="movil" :value="__('Móvil')" />
            <x-text-input id="movil" name="movil" type="tel" 
                            class="mt-1 block w-full" :value="old('movil', $user->movil)" 
                            required autofocus autocomplete="movil" />
            <x-input-error class="mt-2" :messages="$errors->get('movil')" />
        </div>

        <!-- Dirección -->
        <div>
            <x-input-label for="direccion" :value="__('Dirección')" />
            <textarea id="direccion" name="direccion" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required autofocus>{{ old('direccion', $user->direccion) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('direccion')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Tu dirección de correo electrónico no está verificada') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Haga clic aquí para volver a enviar el correo electrónico de verificación.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <!-- Botón de Actualizar Información -->
    <div class="flex justify-center mt-4">
        <x-primary-button class="px-8 py-2" id="update-info">{{ __('Actualizar Información') }}</x-primary-button>
    </div>
</form>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Si existe el mensaje 'status' en la sesión
            @if(session('status') === 'profile-updated')
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Los datos personales han sido actualizados correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Entendido'
                });
            @endif
        });
    </script> 
@endpush
