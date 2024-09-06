<x-app-layout>
    <div class="py-12">
        <div class="rounded-lg max-w-7xl mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
            <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden lg:py-24"
                 style="background-image: url('{{ asset('images/home_manos.png') }}'); height: 60vh; background-position: center;">
                <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
                    <div class="relative">
                        <h2 class="text-center text-4xl leading-8 font-extrabold tracking-tight text-white sm:text-6xl">
                            ¿QUIERES FORMAR PARTE DEL CAMBIO?: ¡VEN Y REGÍSTRATE!
                        </h2>
                        <p class="mt-4 max-w-3xl mx-auto font-extrabold text-center text-xl text-white">
                            Apostamos por los talentos y las habilidades de las personas para generar un gran cambio
                            positivo en nuestra comunidad. El verdadero talento es suyo, el nuestro, la habilidad de ver
                            que ahí reside su fuerza.
                        </p>
                        <div class="flex justify-center items-center py-24">
                            <a href="{{ route('register') }}" 
                                class="bg-amber-500 py-2 px-4 rounded-lg text-white font-bold uppercase text-center">
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
