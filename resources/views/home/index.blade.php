<x-app-layout>
    <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
        <!-- Contenedor de imagen de fondo en ancho completo -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden lg:py-24"
             style="background-image: url('{{ asset('images/home_manos.png') }}'); height: 75vh; background-size: cover;">
            <div class="flex items-center justify-center h-full w-full px-2 sm:px-4 lg:px-6">
                <div class="text-center">
                    <h2 class="text-3xl sm:text-3xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-white">
                        ¿QUIERES FORMAR PARTE DEL CAMBIO?:    
                        ¡VEN Y REGÍSTRATE!
                    </h2>
                    <p class="text-xl sm:text-xl md:text-2xl lg:text-3xl leading-tight tracking-tight text-center text-white">
                        Apostamos por los talentos y las habilidades de las personas para generar un gran cambio positivo en nuestra comunidad. 
                        El verdadero talento es suyo, el nuestro, la habilidad de ver que ahí reside su fuerza.
                    </p>
                    <div class="flex justify-center items-center py-6 sm:py-8 lg:py-12">
                        <a href="{{ route('register') }}" 
                           class="bg-amber-500 py-4 px-8 rounded-lg text-white font-bold uppercase underline text-center text-lg sm:text-xl md:text-2xl">
                            REGÍSTRATE
                        </a>
                    </div>
                </div>
            </div>
        </div> 
    </div>     
        <livewire:home-vacantes/>       
</x-app-layout>
