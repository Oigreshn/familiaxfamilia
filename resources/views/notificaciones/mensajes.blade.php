<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones de Mensajes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-center my-10">
                        Mis Notificaciones de Mensajes
                    </h1>

                    <div class="divide-y divide-gray-200">
                        @forelse ($notificaciones as $notificacion)
                            <div class="p-5 lg:flex lg:justify-between lg:items-center">
                                <div>   
                                    <p>{{ $notificacion->data['sender_name'] }} te ha enviado un mensaje en la Oportunidad: 
                                        <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                    </p>
                                    
                                    <p>Hace:
                                        <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>

                                <div class="mt-5 lg:mt-0">
                                    <a href="{{ route('mensajes.index', [$notificacion->data['id_vacante'], $notificacion->data['sender_id']]) }}" class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg">
                                        Ver Mensajes
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600">No hay Notificaciones de Mensajes Nuevos</p>
                        @endforelse
                    </div>   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
