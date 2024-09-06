<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-bold text-center underline">
            {{ __('Crea tu Avatar') }}
        </h2>
        <p class="text-1xl font-semibold text-center">
            {{ __("Selecciona las características de tu Avatar") }}
        </p>
    </header>

    <div>
        <h3>Genera tu Avatar</h3>
        <img id="avatar" src="https://avatars.dicebear.com/api/bottts/default.svg" alt="Generated Avatar" width="100" height="100">
        <button onclick="generateAvatar()">Generar Nuevo Avatar</button>
    </div>

    <div class="flex items-center justify-center gap-4 mt-6">
        <button id="generate-avatar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Generar Avatar') }}</button>
    </div>
</section>

<script>
    function generateAvatar() {
        let seed = Math.random().toString(36).substring(7); // Genera una cadena aleatoria
        document.getElementById('avatar').src = `https://avatars.dicebear.com/api/bottts/${seed}.svg`;
    }
</script>
