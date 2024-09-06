<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta Oportunidad</h3>

    @if (@session()->has('mensaje'))
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg w-full sm:w-96 text-center">
            {{ session('mensaje') }}
        </p>
    @else
        <form wire:submit.prevent='postularme' class="w-full max-w-md mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida (PDF)')" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>
            
            <x-primary-button wire:loading.attr="disabled" class="w-ful text-center">
                {{ __('Postularme') }}
                <div 
                    wire:loading wire:target="postularme"
                    class="inline-block h-4 w-4 mr-1 animate-spin rounded-full border-4 border-solid 
                    border-current border-r-transparent align-[-0.125em] text-white 
                    motion-reduce:animate-[spin_1.5s_linear_infinite]" 
                    role="status">
                </div>
            </x-primary-button>
        </form>        
    @endif
</div>
