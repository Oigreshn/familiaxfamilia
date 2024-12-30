<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}"> 
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                @auth
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')">
                            {{ __('Mis Anuncios') }}
                        </x-nav-link>
                
                        <x-nav-link :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')">
                            {{ __('Crear un Anuncio') }}
                        </x-nav-link>
                    </div>
                @endauth
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <a href="{{ route('conversaciones.index') }}" 
                        class="mr-2 w-7 h-7 rounded-full flex flex-col justify-center">
                        <!-- Icono de conversación -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                    </a>
                
                    <!-- Icono de Mensajes Nuevos -->
                    <a href="{{ route('notificaciones.mensajes') }}" 
                        class="relative inline-flex items-center mr-2 w-7 h-7 bg-slate-800 hover:bg-amber-500 rounded-md flex-col justify-center text-sm font-extrabold text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>

                        <!-- Contador de Mensajes Nuevos -->
                        @if(Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje')->count() > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{ Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje')->count() }}
                            </span>
                        @endif
                    </a>

                    <!-- Icono de Notificaciones Nuevas -->
                    <a href="{{ route('notificaciones') }}" 
                        class="relative inline-flex items-center mr-2 w-7 h-7 bg-slate-800 hover:bg-amber-500 rounded-md flex-col justify-center text-sm font-extrabold text-white">

                        <!-- Icono de Notificaciones Nuevas -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                        </svg>

                        <!-- Contador de Notificaciones Nuevas -->
                        @if(Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoCandidato')->count() > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{ Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoCandidato')->count() }}
                            </span>
                        @endif
                    </a>


                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Sección de Información General -->
                            <h3 class="font-semibold text-base text-gray-800 leading-tight">Información General</h3>
                            <x-dropdown-link :href="route('profile.edit')"
                                class="text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out mb-2"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                              
                                {{ __('Tus Datos') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('avatar.index')"
                                class="text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                              </svg>
                              
                                {{ __('Imagen de Perfil') }}
                            </x-dropdown-link>
                        
                            <!-- Sección de Personalización y Características -->
                            <h3 class="font-semibold text-base text-gray-800 leading-tight mt-4">Competencias</h3>
                            <x-dropdown-link :href="route('habilidades.index')"
                                class="text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                </svg>
                              
                                {{ __('Habilidades') }}
                            </x-dropdown-link>
                        
                            <x-dropdown-link :href="route('talentos.index')"
                                class="text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out mt-2"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                </svg>
                              
                                {{ __('Talentos') }}
                            </x-dropdown-link>
                        
                            <x-dropdown-link :href="route('principios.index')"
                                class="text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out mt-2"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                                </svg>
                              
                                {{ __('Principios') }}
                            </x-dropdown-link>
                        
                            <h3 class="font-semibold text-base text-gray-800 leading-tight mt-4">¡Hasta Luego!</h3>
                            <!-- Cerrar Sesión -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-center rounded-full px-4 py-2 text-sm 
                                    leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                    focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out mt-2"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                    </svg>
                                  
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>                        
                    </x-dropdown>
                @endauth
                
                @php
                    $currentUrl = url()->current();
                @endphp

                @guest
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('funcionamiento')"
                                    :active="str_contains($currentUrl, route('funcionamiento'))">
                            {{ __('¿Cómo Funciona?') }}
                        </x-nav-link>

                        <x-nav-link :href="route('seccionpersonas')"
                                    :active="str_contains($currentUrl, route('seccionpersonas'))">
                            {{ __('Personas') }}
                        </x-nav-link>

                        <x-nav-link :href="route('cambiarlascosas')"
                                    :active="str_contains($currentUrl, route('cambiarlascosas'))">
                            {{ __('El Cambio') }}
                        </x-nav-link>
                    
                        <x-nav-link :href="route('amasfamilias')"
                                    :active="str_contains($currentUrl, route('amasfamilias'))">
                            {{ __('A+Familias') }}
                        </x-nav-link>
                    </div>
                    
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('login')">
                            {{ __('Iniciar Sesión') }}
                        </x-nav-link>
                    </div>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @auth
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('vacantes.index')" class="block w-full text-center rounded-full px-4 py-2 text-sm 
                    leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out" 
                    :active="request()->routeIs('vacantes.index')">
                        {{ __('Anuncios') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('vacantes.create')" class="block w-full text-center rounded-full px-4 py-2 text-sm 
                    leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out" 
                    :active="request()->routeIs('vacantes.create')">
                        {{ __('Crear un Anuncio') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Opcion de Mis Conversaciones -->
                <div class="flex gap-2 items-center p-3">
                    <a href="{{ route('conversaciones.index') }}" 
                        class="mr-2 w-7 h-7 rounded-full flex flex-col justify-center">
                        <!-- Icono de conversación -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                    </a>
                    <p class="text-base font-medium text-gray-600">
                    Mis Conversaciones
                    </p>
                </div>

                <!-- Icono de Mensajes Nuevos -->
                <div class="flex gap-2 items-center p-3">
                    <a href="{{ route('notificaciones.mensajes') }}" 
                        class="relative inline-flex items-center mr-2 w-7 h-7 bg-slate-800 hover:bg-amber-500 rounded-md flex-col justify-center text-sm font-extrabold text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <!-- Contador de Mensajes Nuevos -->
                        @if(Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje')->count() > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{ Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje')->count() }}
                            </span>
                        @endif
                    </a>
                    <p class="text-base font-medium text-gray-600">
                        Mensajes Nuevos
                    </p>
                </div>

                <!-- Icono de Notificaciones Nuevas -->
                <div class="flex gap-2 items-center p-3">
                        <a href="{{ route('notificaciones') }}" 
                        class="relative inline-flex items-center mr-2 w-7 h-7 bg-slate-800 hover:bg-amber-500 rounded-md flex-col justify-center text-sm font-extrabold text-white">

                        <!-- Icono de Notificaciones Nuevas -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                        </svg>
                        <!-- Contador de Notificaciones Nuevas -->
                        @if(Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoCandidato')->count() > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{ Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoCandidato')->count() }}
                            </span>
                        @endif
                    </a>
                    <p class="text-base font-medium text-gray-600">
                        Notificaciones 
                    </p>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                <div class="mt-3 space-y-1">
                    <!-- Sección de Información General -->
                    <h3 class="font-semibold text-base text-gray-800 leading-tight">Información General</h3>
                        <x-responsive-nav-link :href="route('profile.edit')" class="block w-full text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                    
                            {{ __('Tus Datos') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('avatar.index')" class="block w-full text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                    </svg>
                                
                                    {{ __('Imagen de Perfil') }}
                        </x-responsive-nav-link>

                    <h3 class="font-semibold text-base text-gray-800 leading-tight mt-4">Competencias</h3>
                        <x-responsive-nav-link :href="route('habilidades.index')" class="block w-full text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                    </svg>
                                
                                    {{ __('Habilidades') }}
                        </x-responsive-nav-link>
                            
                        <x-responsive-nav-link :href="route('talentos.index')" class="block w-full text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                    </svg>
                                
                                    {{ __('Talentos') }}
                        </x-responsive-nav-link>
                            
                        <x-responsive-nav-link :href="route('principios.index')" class="block w-full text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                                    </svg>
                                
                                    {{ __('Principios') }}
                        </x-responsive-nav-link>

                    <h3 class="font-semibold text-base text-gray-800 leading-tight mt-4">¡Hasta Luego!</h3>
                    <!-- Cerrar Sesión -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="block w-full text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out"    
                            >
                                {{ __('Cerrar Sesión') }}
                            </x-responsive-nav-link>
                        </form>
                </div>
            </div>
        @endauth

        @guest
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('funcionamiento')">
                    {{ __('¿Cómo Funciona?') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('seccionpersonas')">
                    {{ __('Personas') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('cambiarlascosas')">
                    {{ __('El Cambio') }}
                </x-responsive-nav-link>
            
                <x-responsive-nav-link :href="route('amasfamilias')">
                    {{ __('A+Familias') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('login')">
                    {{ __('Iniciar Sesión') }}
                </x-responsive-nav-link>
                
                {{-- <x-responsive-nav-link :href="route('register')">
                    {{ __('Crear Cuenta') }}
                </x-responsive-nav-link> --}}
            </div>
        @endguest
    </div>
</nav>
