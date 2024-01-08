<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 dark:text-gray-100 border-b md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="{{ route('vacantes.show', $vacante->id )}}" class="text-xl font-bold">{{ $vacante->titulo }}</a>
                    <p class="text-sm text-gray-600 dark:text-gray-200 font-bold "> {{$vacante->empresa}} </p>
                    <p class="text-sm text-gray-400 dark:text-gray-300">Ultimo Día: {{$vacante->ultimodia->format('d/m/Y')}}</p>
                </div>
                <div class="flex flex-col md:flex-row items-stretch gap-3  mt-5 md:mt-0">
                    <a href="{{route('candidatos.index', $vacante)}}" class="bg-slate-800 dark:bg-slate-600 text-white py-2 px-4 rounded-lg text-xs font-bold uppercase text-center">
                        {{$vacante->candidatos->count()}} Candidatos
                    </a>
                    <a href=" {{ route('vacantes.edit', $vacante->id) }} " class="bg-blue-600 text-white py-2 px-4 rounded-lg text-xs font-bold uppercase text-center">
                        Editar
                    </a>
                    <button wire:click="$dispatch('mostrarAlerta', {{$vacante->id}})" class="bg-red-500 text-white py-2 px-4 rounded-lg text-xs font-bold uppercase text-center">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-200">No hay vacantes</p>
        @endforelse
    </div>
    
    <div class="flex justify-center mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: '¿Desea eliminar la vacante?',
                text: "Una vacante eliminada no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar vacante',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // eliminar vacante
                    Livewire.dispatch('eliminarVacante', {vacante: vacanteId});
                    Swal.fire(
                        'Se eliminó la vacante!',
                        'Eliminado correctamente.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush