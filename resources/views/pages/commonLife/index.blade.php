<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Vie commune') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid gap-2">
                {{-- Shows all tasks --}}
                @forelse($commonLifes as $commonLife)
                    @include('pages.commonLife.partials.task-card', ['commonLife' => $commonLife])
                @empty
                    {{-- Card that says there is no task in progress --}}
                    <div class="card">
                        <div class="card-body">
                            Pas de tâche pour le moment :(
                        </div>
                    </div>
                @endforelse

                @include('pages.commonLife.partials.modal-add')
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="grid gap-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Tâches réalisées (Communes)
                        </h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Tâches réalisées (Vous)
                        </h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
