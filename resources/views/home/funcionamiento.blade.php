<x-app-layout>
      <div class="py-12">
        <div class="rounded-lg max-w-7xl mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
            
          <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden lg:py-24"
                style="background-image: url('{{ asset('images/funcionamiento.png') }}'); height: 80vh; background-position: center;">
                
                <!-- Primer bloque de texto justificado a la izquierda -->
                <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl text-left">
                    <div class="space-y-0 mb-6">
                        <p class="text-4xl sm:text-6xl md:text-6xl tracking-tight text-white ml-8 sm:ml-8">
                            <span class="text-amber-500 font-extrabold">¿</span>
                            <span>CÓMO</span>
                        </p>
                        <p class="text-4xl sm:text-6xl md:text-6xl font-extrabold tracking-tight text-white">
                            FUNCIONA
                        </p>
                        <p class="text-4xl sm:text-6xl md:text-6xl tracking-tight text-white ml-8 sm:ml-8">
                            NUESTRA
                        </p>
                        <p class="text-4xl sm:text-6xl md:text-6xl font-extrabold tracking-tight text-white">
                            PLATAFORMA<span class="text-red-600 font-extrabold">?</span>
                        </p>
                    </div>

                    <!-- Segundo bloque de texto justificado a la izquierda -->
                    <div class="text-white space-y-0">
                        <p class="text-2xl sm:text-3xl md:text-4xl leading-tight tracking-tight ml-12 sm:ml-12 mb-4">
                            <span class="bg-amber-500 px-2 py-1 font-extrabold rounded-lg ">4 PASOS</span>
                            <span>TE SEPARAN</span>
                        </p>
                        <p class="text-2xl sm:text-3xl md:text-4xl leading-tight tracking-tight ml-20 sm:ml-20 mt-4">
                            DEL 
                            <span class="text-white bg-red-600 px-2 py-1 font-extrabold rounded-lg">CAMBIO:</span>
                        </p>
                    </div>
                </div>
           </div>

           <div class="flex flex-col gap-16 lg:flex-col justify-center items-center divide-y divide-gray-200 shadow-md p-6">
                  <!-- Paso 1 -->
                  <div class="flex flex-col md:flex-row items-center justify-center py-6 w-full space-y-4 md:space-y-0 md:space-x-6">
                      <span class="flex-shrink-0 text-8xl font-bold text-amber-500 text-center">1</span>
                      <div class="flex-1 text-center md:text-left px-4 max-w-lg">
                          <p class="font-bold text-lg leading-relaxed text-justify">REGÍSTRATE EN LA PLATAFORMA.</p>
                      </div>
                      <img src="{{ asset('images/icon_1.png') }}" alt="Icono 1" class="flex-shrink-0 w-64 h-auto md:w-48 md:h-48 object-contain">
                  </div>
              
                  <!-- Paso 2 -->
                  <div class="flex flex-col md:flex-row items-center justify-center py-6 w-full space-y-4 md:space-y-0 md:space-x-6">
                      <img src="{{ asset('images/icon_2.png') }}" alt="Icono 2" class="flex-shrink-0 w-64 h-auto md:w-48 md:h-48 object-contain">
                      <span class="flex-shrink-0 text-8xl font-bold text-amber-500 text-center">2</span>
                      <div class="flex-1 text-center md:text-left px-4 max-w-lg">
                          <p class="font-bold text-lg leading-relaxed text-justify">¿HAS DETECTADO ALGUNA NECESIDAD O CARENCIA EN TU ENTIDAD? PUBLICA TU OPORTUNIDAD EN LA PLATAFORMA.</p>
                          <p class="text-md text-justify">SI TIENES PROBLEMAS PARA PUBLICAR TU PRIMERA OPORTUNIDAD, NO DUDES EN CONSULTARNOS. ¡ESTE ES UNO DE NUESTROS TALENTOS!</p>
                      </div>
                  </div>

                  <!-- Paso 3 -->
                  <div class="flex flex-col md:flex-row items-center justify-center py-6 w-full space-y-4 md:space-y-0 md:space-x-6">
                    <span class="flex-shrink-0 text-8xl font-bold text-amber-500 text-center">3</span>
                    <div class="flex-1 text-center md:text-left px-4 max-w-lg">
                        <p class="font-bold text-lg leading-relaxed text-justify">
                          CONTACTA CON LAS PERSONAS INTERESADAS EN RESOLVER TU OPORTUNIDAD. INTERCAMBIA IMPRESIONES Y GESTIONA TUS CANDIDATOS.
                        </p>
                    </div>
                    <img src="{{ asset('images/icon_3.png') }}" alt="Icono 2" class="flex-shrink-0 w-64 h-auto md:w-48 md:h-48 object-contain">
                </div>

                <!-- Paso 4 -->
                <div class="flex flex-col md:flex-row items-center justify-center py-6 w-full space-y-4 md:space-y-0 md:space-x-6">
                  <img src="{{ asset('images/icon_4.png') }}" alt="Icono 2" class="flex-shrink-0 w-64 h-auto md:w-48 md:h-48 object-contain">
                  <span class="flex-shrink-0 text-8xl font-bold text-amber-500 text-center">4</span>
                  <div class="flex-1 text-center md:text-left px-4 max-w-lg">
                      <p class="text-md text-justify">
                          CONFIRMA LA "OPORTUNIDAD", ACOMPAÑA A LA PERSONA Y FORMA PARTE DEL CAMBIO. DA ESA PRIMERA OPORTUNIDAD, APRECIA SU POTENCIAL 
                          Y AYUDA A QUE MÁS PERSONAS PUEDAN DEMOSTRAR SU VALOR HUMANO. RECUERDA: NO TIENES POR QUÉ PREOCUPARTE POR NADA MÁS. 
                          <a href="https://amasfamilias.com/" target="_blank" class="text-amber-500 font-extrabold underline">A+FAMILIAS</a> SE ENCARGA DEL RESTO (SEGUROS, RETRIBUCIÓN...)  
                      </p>
                  </div>
              </div>              
            </div>
        </div>
    </div>
</x-app-layout>
