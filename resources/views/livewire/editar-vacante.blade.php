<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <!-- label titulo de vacante -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Titulo vacante"/>
        
        @error('titulo')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <!-- label salario -->
    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />
        <select wire:model="salario" id="salario" class="w-full block mb-2 font-bold text-sm text-gray-700 dark:focus:border-indigo-300">
            <option value="">--Seleccione--</option>

            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{$salario->salario}}</option>
                
            @endforeach
        </select>

        @error('salario')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror   
    </div>

    <!-- label categoria -->
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select wire:model="categoria" id="categoria" class="w-full block mb-2 font-bold text-sm text-gray-700 dark:focus:border-indigo-300">
        
            <option value="">--Seleccione--</option>

            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{$categoria->categoria}}</option>
                
            @endforeach
        </select>

        @error('categoria')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror      
    </div>

    <!-- label empresa -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Empresa ej. Mercado Libre, Uber, IKEA"/>
    
        @error('empresa')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <!-- label calendario -->
    <div>
        <x-input-label for="ultimodia" :value="__('Ultimo dia para postularse')" />
        <x-text-input id="ultimodia" class="block mt-1 w-full" type="date" wire:model="ultimodia" :value="old('ultimodia')"/>
    
        @error('ultimodia')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror        
    </div>
    
    <!-- label descripcion -->
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion de la vacante')" />
        <textarea 
        wire:model="descripcion" 
        id="descripcion" 
        class="w-full h-72 block mb-2 font-bold text-sm text-gray-700 dark:focus:border-indigo-300" 
        placeholder="Descripcion general del puesto, experiencia, habilidades"></textarea>
    
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror      
    </div>

    <!-- Label imagen -->
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*"/>
        
        <div class="my-5 w-96">
            <x-input-label :value="__('Imagen Actual')" />
            <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="{{ 'Imagen vacante ' . $titulo }}">
        </div>

        <div class="my-5 w-96">
            @if ($imagen_nueva)
                <p>Imagen nueva:</p>
                <img src="{{ $imagen_nueva->temporaryUrl() }}">
            @endif
        </div>

        @error('imagen_nueva')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror  
    </div>
    

    <x-primary-button>
        Guardar cambios
    </x-primary-button>
</form>

