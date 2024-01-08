<div class="p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text- center text-2xl font-bold my-4 dark:text-gray-100">Postulate al puesto</h3>
    @if (session()->has('mensaje'))
        <p class="rounded-lg text-sm uppercase border-green-300 bg-green-500 font-bold p-2 text-white my-5">
            {{session('mensaje')}}
        </p>
    @else
        <form class="w-96 mt-5" wire:submit.prevent="postularme">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum (PDF)')" />
                <x-text-input id="cv" type="file" accept=".pdf" wire:model='cv' class="block mt w-full" />
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message">
            @enderror   

            <x-primary-button class="my-5">
                {{__('Postularme')}}
            </x-primary-button>

        </form>
    @endif
    

</div>
