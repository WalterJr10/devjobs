<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos para la vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center mb-10">Candidatos para {{$vacante->titulo}}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium">{{$candidato->user->name}}</p>
                                        <p class="text-sm">{{$candidato->user->email}}</p>
                                        <p class="text-sm">Fecha de postulación: {{$candidato->created_at->diffForHumans()}}</p>
                                    </div>
                                    <div>
                                        <a 
                                            href="{{ asset('storage/cv/' . $candidato->cv) }}"
                                            target="_blank"
                                            rel="noreferrer noopener"
                                            class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 leading-5 font-medium rounded-full bg-indigo-600 hover:bg-indigo-700 text-white">
                                            Ver curriculum</a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm">No hay candidatos</p>
                            @endforelse
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
