<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Conversaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-center my-10">
                        Conversaciones por Oportunidad
                    </h1>

                    <div class="space-y-4">
                        @forelse ($vacantes as $vacante)
                            <div class="p-4 bg-gray-100 rounded-lg">
                                <h2 class="text-lg font-semibold">{{ $vacante->titulo }}</h2>

                                <ul class="mt-4 space-y-2">
                                    @foreach ($vacante->mensajes->groupBy('receiver_id') as $receiverId => $mensajes)
                                        @if ($receiverId !== auth()->user()->id) <!-- Excluir al usuario autenticado -->
                                            <li>
                                                <a href="{{ route('mensajes.index', [$vacante->id, $receiverId]) }}"
                                                   class="text-blue-600 hover:underline">
                                                    Conversación con {{ $mensajes->first()->receiver->name }} ({{ $mensajes->count() }} mensajes)
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @empty
                            <p class="text-gray-600 text-center">No tienes conversaciones aún.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
