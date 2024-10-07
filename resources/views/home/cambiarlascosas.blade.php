<x-app-layout>
      <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden lg:py-24"
            style="background-image: url('{{ asset('images/cambio.png') }}'); height: 80vh; background-size: cover;">

            <div class="px-4 sm:px-6 lg:px-8 lg:max-w-full text-left">
                <div class="space-y-0">
                  <p class="leading-tight tracking-tight text-white">
                    <span class="text-slate-800 font-extrabold text-7xl sm:text-9xl md:text-9xl">¿</span>
                    <span class="font-black text-3xl sm:text-5xl md:text-5xl">QUÉ PUEDES HACER</span>
                  </p>
                  <p class="flex items-center leading-tight tracking-tight text-white ml-8 sm:ml-24">
                    <span class="text-xl sm:text-6xl md:text-6xl self-center">PARA</span>
                    <span class="text-3xl sm:text-8xl md:text-8xl font-extrabold ml-2">CAMBIAR</span>
                  </p>
                  <p class="leading-tight tracking-tight text-white ml-12 sm:ml-40">
                    <span class="text-xl sm:text-6xl md:text-6xl align-top">LAS</span>
                    <span class="text-3xl sm:text-8xl md:text-8xl font-extrabold">COSAS</span>
                    <span class="text-red-500 font-extrabold text-3xl sm:text-8xl md:text-8xl">?</span>
                  </p>
                </div>
              </div> 
            </div>
        </div>

        <div class="flex items-center justify-center text-center">
            <p class="leading-relaxed text-2xl sm:text-4xl md:text-4xl font-bold my-10 max-w-5xl mx-auto text-center">
              Publica tus oportunidades, participa en los procesos de selección o dona para apoyar al proyecto. 
              Si quieres, puedes hacerlo de la siguiente manera.
            </p>
        </div>
          
        <dv class="flex flex-col gap-16 lg:flex-col justify-center items-center p-6">
            <!-- Contenedor de imágenes con texto debajo -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center justify-center">
              <div class="flex flex-col items-center">
                    <img src="{{ asset('images/bizum.png') }}" alt="Bizum" 
                    class="flex-shrink-0 w-128 h-auto md:w-96 md:h-96 object-contain">
                    <span class="text-4xl font-bold text-slate-800 text-center">Bizum</span>
              </div>
              <div class="flex flex-col items-center">
                    <img src="{{ asset('images/cuentabancaria.png') }}" alt="Cuenta Bancaria" 
                    class="flex-shrink-0 w-128 h-auto md:w-96 md:h-96 object-contain">
                    <span class="text-4xl font-bold text-slate-800 text-center">Cuenta Bancaria</span>
              </div>
              <div class="flex flex-col items-center">
                    <img src="{{ asset('images/donacionenweb.png') }}" alt="Donación en Página Web" 
                    class="flex-shrink-0 w-128 h-auto md:w-96 md:h-96 object-contain">
                    <a href="https://amasfamilias.com/" target="_blank" class="text-3xl font-bold text-slate-800 text-center underline">DONACIÓN EN PÁGINA WEB</a>
              </div>
            </div>
          </div>
</x-app-layout>
