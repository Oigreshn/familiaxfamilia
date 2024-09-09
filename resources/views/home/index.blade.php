<x-app-layout>
    <div class="py-12">
        <div class="rounded-lg max-w-7xl mx-auto overflow-hidden bg-white shadow-sm p-4 sm:p-6 divide-y divide-gray-200">
            <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden h-48 sm:h-60 md:h-72 lg:h-96"
                 style="background-image: url('{{ asset('images/home_manos.png') }}'); background-position: center;">
                <div class="flex items-center justify-center h-full max-w-xl mx-auto px-2 sm:px-4 lg:px-6 lg:max-w-7xl">
                    <div class="text-center">
                        <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-extrabold leading-tight tracking-tight text-white">
                            ¿QUIERES FORMAR PARTE DEL CAMBIO?: ¡VEN Y REGÍSTRATE!
                        </h2>
                        <p class="mt-2 sm:mt-4 max-w-3xl mx-auto font-bold text-xs sm:text-sm md:text-base lg:text-lg text-white">
                            Apostamos por los talentos y las habilidades de las personas para generar un gran cambio positivo en nuestra comunidad. 
                            El verdadero talento es suyo, el nuestro, la habilidad de ver que ahí reside su fuerza.
                        </p>
                        <div class="flex justify-center items-center py-6 sm:py-8 lg:py-12">
                            <a href="{{ route('register') }}" 
                               class="bg-amber-500 py-1 px-3 rounded-md text-white font-semibold uppercase text-xs sm:text-sm md:text-base">
                                REGÍSTRATE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <livewire:home-vacantes/>
    </div>
</x-app-layout>
