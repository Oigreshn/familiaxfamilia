<x-app-layout>
    <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden lg:py-24"
             style="background-image: url('{{ asset('images/amasfamilias.png') }}'); height: 80vh; background-size: cover;">
            <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl h-full flex flex-col justify-center items-center">
                <div class="relative mb-6 flex justify-center items-center">
                <!-- Logo grande ajustado solo para pantallas pequeñas -->
                    <img src="{{ asset('images/logo_grande.png') }}" alt="Logo" class="w-full sm:w-48 md:w-56 lg:w-96 object-contain">
                </div>
                <a href="https://amasfamilias.com/" target="_blank"
                    class="bg-slate-800 py-4 px-8 rounded-lg text-white font-bold uppercase underline text-center text-lg sm:text-xl md:text-2xl">
                    CONÓCENOS
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
