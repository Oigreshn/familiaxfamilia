<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tigh">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ step: 1 }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <template x-if="step === 1">
                <div class="p-4 bg-white shadow sm:rounded-lg">
                    @include('profile.partials.update-profile-information-form')
                        <div class="flex justify-end mt-4">
                            <x-secondary-button x-on:click="step = 2">{{ __('Siguiente >>') }}</x-secondary-button>
                        </div>
                </div>
            </template>

            <template x-if="step === 2">
                <div class="p-4 bg-white shadow sm:rounded-lg">
                    <livewire:habilidades/>
                    <div class="flex justify-between mt-4">
                        <x-secondary-button x-on:click="step = 1">{{ __('<< Anterior') }}</x-secondary-button>
                        <x-secondary-button x-on:click="step = 3">{{ __('Siguiente >>') }}</x-secondary-button>
                    </div>
                </div>
            </template>

            <template x-if="step === 3">
                <div class="p-4 bg-white shadow sm:rounded-lg">
                    <livewire:talentos/>
                    <div class="flex justify-between mt-4">
                        <x-secondary-button x-on:click="step = 2">{{ __('<< Anterior') }}</x-secondary-button>
                        <x-secondary-button x-on:click="step = 4">{{ __('Siguiente >>') }}</x-secondary-button>
                    </div>
                </div>
            </template>

            <template x-if="step === 4">
                <div class="p-4 bg-white shadow sm:rounded-lg">
                        <livewire:principios/>
                        <div class="flex justify-between mt-4">
                            <x-secondary-button x-on:click="step = 3">{{ __('<< Anterior') }}</x-secondary-button>
                            <x-secondary-button x-on:click="step = 5">{{ __('Siguiente >>') }}</x-secondary-button>
                        </div>
                </div>
            </template>

            <template x-if="step === 5">
                <div class="p-4 bg-white shadow sm:rounded-lg">
                        <livewire:avatar-generador/>
                        <div class="flex justify-between mt-4">
                            <x-secondary-button x-on:click="step = 4">{{ __('<< Anterior') }}</x-secondary-button>
                            <x-secondary-button x-on:click="step = 6">{{ __('Siguiente >>') }}</x-secondary-button>
                        </div>
                </div>
            </template>

            <template x-if="step === 6">
                <div class="p-4 bg-white shadow sm:rounded-lg">
                        @include('profile.partials.update-password-form')
                        <div class="flex justify-between mt-4">
                            <x-secondary-button x-on:click="step = 5">{{ __('<< Anterior') }}</x-secondary-button>
                            <x-secondary-button x-on:click="step = 7">{{ __('Siguiente >>') }}</x-secondary-button>
                        </div>
                </div>
            </template>

            <template x-if="step === 7">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        @include('profile.partials.delete-user-form')
                        <div class="flex justify-between mt-4">
                            <x-secondary-button x-on:click="step = 6">{{ __('<< Anterior') }}</x-secondarybutton>
                            <x-secondary-button x-on:click="step = 1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                {{ __(' Volver al inicio') }}
                            </x-secondary-button>
                        </div>
                </div>
            </template>
        </div>
    </div>
</x-app-layout>
