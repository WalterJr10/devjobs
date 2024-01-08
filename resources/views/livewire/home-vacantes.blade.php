<div>

    <livewire:filtrar-vacantes />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl dark:text-gray-300 text-gray-700 mb-12">Nuestras vacantes disponibles</h3>
            <div class="shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div>
                            <a class="font-extrabold text-3xl dark:text-gray-300 text-gray-600" href="{{route('vacantes.show', $vacante->id)}}">{{$vacante->titulo}}</a>
                            <p class="text-base dark:text-gray-300 text-gray-600">{{$vacante->empresa}}</p>
                            <p class="font-bold text-xs dark:text-gray-300 text-gray-600">Ultimo dia para postularse: <span class="font-normal">{{$vacante->ultimodia->format('d/m/Y')}}</span></p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class="bg-indigo-500 text-white hover:bg-indigo-700 p-3 text-sm uppercase font-bold" href="{{route('vacantes.show', $vacante->id)}}">Ver vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm dark:text-gray-300 text-gray-600">No hay vacantes aún</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
