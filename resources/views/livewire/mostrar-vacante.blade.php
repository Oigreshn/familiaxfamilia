<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacante->titulo }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa:
                <span class="normal-case font-normal">{{ $vacante->entidad }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Último día para postularse:
                <span class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoría:
                <span class="normal-case font-normal">{{ $vacante->categoria->descripcion }}</span>
            </p>
        </div>

    </div>

    {{-- Zona de la Imagen y la Descripcion --}}
    <div class="md:grid md:grid-cols-6 gap-4">
        {{-- Zona de la Imagen --}}
        <div class="md:col-span-2">
            <img class="rounded-lg" src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{'Imagen vacante ' . $vacante->titulo}}">
        </div>

        {{-- Zona de la Descripcion --}} 
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción de Oprtunidad:</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Deseas aplicar a esta Oportunidad?, <a class="font-bold text-indigo-600" href="{{ route('register') }}">
                    Obten una cuenta y aplica a esta y otras oportunidades
                </a>
            </p>
        </div>
    @endguest
    
    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />    
    @endcannot
    
</div>
