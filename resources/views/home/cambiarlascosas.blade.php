<x-app-layout>
    <div class="py-12">
      <div class="rounded-lg max-w-7xl mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden lg:py-24"
            style="background-image: url('{{ asset('images/cambio.png') }}'); height: 70vh; background-position: center">

            <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl text-left">
                <div class="space-y-0">
                  <p class="tracking-tight text-white">
                    <span class="text-slate-800 font-extrabold text-6xl sm:text-6xl md:text-8xl">¿</span>
                    <span class="text-xl sm:text-2xl md:text-3xl font-black">QUÉ PUEDES HACER</span>
                  </p>
                  <p class="tracking-tight text-xl sm:text-4xl md:text-5xl text-white ml-8 sm:ml-24">
                    <span class="text-xl sm:text-2xl md:text-3xl font-black">PARA</span>
                    <span class="text-5xl sm:text-5xl md:text-7xl font-extrabold">CAMBIAR</span>
                  </p>
                  <p class="tracking-tight text-white ml-12 sm:ml-40">
                    <span class="align-top text-xl sm:text-2xl md:text-3xl font-black">LAS</span>
                    <span class="text-4xl sm:text-5xl md:text-6xl font-extrabold">COSAS</span>
                    <span class="text-red-500 font-extrabold text-4xl sm:text-4xl md:text-6xl">?</span>
                  </p>
                </div>
              </div> 
            </div>
        </div>

        <div class="flex items-center justify-center text-center">
            <p class="text-2xl font-bold my-10 max-w-3xl mx-auto text-justify">
              Publica tus oportunidades, participa en los procesos de selección o dona para apoyar al proyecto. 
              Si quieres, puedes hacerlo de la siguiente manera.
            </p>
          </div>
          

        <dv class="flex flex-col gap-16 lg:flex-col justify-center items-center p-6">
            <!-- Contenedor de imágenes con texto debajo -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center justify-center">
              <div class="flex flex-col items-center">
                    <img src="{{ asset('images/bizum.png') }}" alt="Bizum" class="w-64 h-auto md:w-48 md:h-48 object-contain">
                    <span class="text-4xl font-bold text-slate-800 text-center">Bizum</span>
              </div>
              <div class="flex flex-col items-center">
                    <img src="{{ asset('images/cuentabancaria.png') }}" alt="Cuenta Bancaria" class="w-64 h-auto md:w-48 md:h-48 object-contain">
                    <span class="text-4xl font-bold text-slate-800 text-center">Cuenta Bancaria</span>
              </div>
              <div class="flex flex-col items-center">
                    <img src="{{ asset('images/donacionenweb.png') }}" alt="Donación en Página Web" class="w-64 h-auto md:w-48 md:h-48 object-contain">
                    <a href="https://amasfamilias.com/" target="_blank" class="text-3xl font-bold text-slate-800 text-center underline">DONACIÓN EN PÁGINA WEB</a>
              </div>
            </div>
          </div>
          
  </div>
</x-app-layout>
