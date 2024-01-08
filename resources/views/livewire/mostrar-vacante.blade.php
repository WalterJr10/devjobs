<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-100 my-3">
            {{$vacante->titulo}}
        </h3>
    </div>
    <div class="md:grid md:grid-cols-2 p-4 my-10">
        <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-100 my-3">
            Empresa: <span class="font-normal normal-case">{{$vacante->empresa}}</span></p>
        <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-100 my-3">
            Ultimo dia para postularse: <span class="font-normal normal-case">{{$vacante->ultimodia->toFormattedDateString()}}</span></p>
    
    
        <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-100 my-3">
            Categoria: <span class="font-normal normal-case">{{$vacante->categoria->categoria}}</span></p>
    
    
        <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-100 my-3">
            Salario: <span class="font-normal normal-case">{{$vacante->salario->salario}}</span></p>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            {{-- imagen --}}
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen)}}" alt="{{'imagen vacante' . $vacante->titulo}}">
        </div>
        <div class="md:col-span-4">
            {{-- Descripcion --}}
            <h2 class="text-2xl font-bold mb-5 dark:text-gray-100">Descripción del puesto</h2>
            <p class="dark:text-gray-100">{{$vacante->descripcion}}</p>
        </div>
    </div>
    
    @guest    
        <div class="mt-5 border border-dashed p-5 text-center dark:border-indigo-900">
            <p class="dark:text-gray-100">
                ¿Deseas postularte a esta vacante? <a class="font-bold text-indigo-600 dark:text-indigo-400" href="{{route('register')}}">Crea una cuenta y aplica.</a>
            </p>
        </div>
    @endguest
    
    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante" />
        @endcannot
    @endauth

    
</div>
