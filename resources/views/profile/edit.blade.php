<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tigh">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ step: 1 }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <template x-if="step === 1">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                        <div class="flex justify-end mt-4">
                            <x-secondary-button x-on:click="step = 2">{{ __('Siguiente') }}</x-secondary-button>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="step === 2">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <livewire:habilidades/>
                        <div class="flex justify-between mt-4">
                            <x-secondary-button x-on:click="step = 1">{{ __('Anterior') }}</x-secondary-button>
                            <x-secondary-button x-on:click="step = 3">{{ __('Siguiente') }}</x-secondary-button>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="step === 3">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <livewire:talentos/>
                        <div class="flex justify-between mt-4">
                            <x-secondary-button x-on:click="step = 2">{{ __('Anterior') }}</x-secondary-button>
                            <x-secondary-button x-on:click="step = 4">{{ __('Siguiente') }}</x-secondary-button>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="step === 4">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <livewire:principios/>
                        <div class="flex justify-between mt-4">
                            <x-secondary-button x-on:click="step = 3">{{ __('Anterior') }}</x-secondary-button>
                            <x-secondary-button x-on:click="step = 5">{{ __('Siguiente') }}</x-secondary-button>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="step === 5">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <livewire:avatar-generador/>
                        <div class="flex justify-between mt-4">
                            <x-secondary-button x-on:click="step = 4">{{ __('Anterior') }}</x-secondary-button>
                            <x-secondary-button x-on:click="step = 6">{{ __('Siguiente') }}</x-secondary-button>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="step === 6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                        <div class="flex justify-between mt-4">
                            <x-secondary-button x-on:click="step = 5">{{ __('Anterior') }}</x-secondary-button>
                            <x-secondary-button x-on:click="step = 7">{{ __('Siguiente') }}</x-secondary-button>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="step === 7">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                        <div class="flex justify-between mt-4">
                            <x-secondary-button x-on:click="step = 6">{{ __('Anterior') }}</x-secondarybutton>
                            <x-secondary-button x-on:click="step = 1">{{ __('Volver al inicio') }}</x-secondary-button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</x-app-layout>
