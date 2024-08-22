<section class="max-w-md mx-auto">
    <header class="text-center mb-5">
        <div class="flex justify-center items-center mb-4">
            <img src="{{ asset('images/cambiar_password.png') }}" alt="Icono Cambiar Password" class="h-16 w-16">
        </div>
        <h2 class="text-2xl font-bold underline">
            {{ __('CAMBIAR PASSWORD') }}
        </h2>
        <p class="text-center text-md font-semibold">
            {{ __('Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerse segura') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="flex flex-col items-center" novalidate>
        @csrf
        @method('put')

        <div>
            <x-text-input id="update_password_current_password" name="current_password" type="password" placeholder="Password Actual"
                class="mt-1 block w-full rounded-full border border-gray-400 px-4 py-2" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-text-input id="update_password_password" name="password" type="password" placeholder="Nuevo Password"
                class="mt-1 block w-full rounded-full border border-gray-400 px-4 py-2" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" placeholder="Repetir Password"
                class="mt-1 block w-full rounded-full border border-gray-400 px-4 py-2" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Botón de Actualizar Información -->
        <div class="flex justify-center mt-4">
            <x-primary-button class="px-8 py-2">
                {{ __('Cambiar Password') }}
                <div 
                wire:loading wire:target="password.update"
                class="inline-block h-4 w-4 ml-2 animate-spin rounded-full border-4 border-solid 
                border-current border-r-transparent align-[-0.125em] text-white 
                motion-reduce:animate-[spin_1.5s_linear_infinite]" 
                role="status">
            </div>
            </x-primary-button>
        </div>

        <!-- Mensaje de estado -->
        <div class="md:col-span-2 flex items-center justify-center">
            @if (session('status'))
                <p x-data="{ show: true }" x-show="show" 
                class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
                    {{ session('status') }}
                </p>
            @endif
        </div>
    </form>
</section>
