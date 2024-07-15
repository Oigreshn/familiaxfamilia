<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante )
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">
                        {{ $vacante->entidad }}
                    </p>
                    <p class="text-sm text-gray-500">
                        Último dia: {{ $vacante->ultimo_dia->format('d/m/Y') }}
                    </p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="{{ route('candidatos.index', $vacante) }}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        {{ $vacante->candidatos->count() }} Candidatos
                    </a>
                    <a href=" {{ route('vacantes.edit', $vacante->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Editar
                    </a>
                    <button wire:click="$dispatch('mostrarAlerta', { vacante: {{$vacante->id}} })"
                        class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Eliminar
                    </button>
                </div>
            </div>        
        @empty
            <p class="p-3 text-center text-sm text-gray-600">
                No hay Oportunidades que mostrar.
            </p>       
        @endforelse 

        {{-- Agregando paginacion a esta sección, para que se note bajar en el Controlador el numero de Registros --}}
        <div class="mt-2 md:mt-0">
            {{ $vacantes->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', vacante => {
                Swal.fire({
                    title: '¿Desea Eliminar Oportunidad?',
                    text: "¡Esta acción NO podrás revertirla!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, ¡ELIMINAR!',
                    cancelButtonText: 'CANCELAR'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminarVacante',[vacante]);
 
                        Swal.fire(
                            '¡ELIMINADA!',
                            'Tu Oportunidad ha sido eliminada.',
                            'success'
                        )
                    }
                });
       });
    });

        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', (vacanteId) => {
                Swal.fire({
                    title: '¿Eliminar Oportunidad?',
                    text: "Una Oprotunidad eliminada, no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡ELIMINAR!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarVacante',vacanteId);
                        Swal.fire(
                            'Se eliminó la Oportunidad',
                            'Eliminada correctamente',
                            'success'
                        )
                    }
                })
 
            });
        });
    </script>
@endpush
