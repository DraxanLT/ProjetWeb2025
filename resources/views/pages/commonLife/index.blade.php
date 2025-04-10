<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Vie commune') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid gap-5 lg:gap-7.5 items-stretch">
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
    </div>
    <!-- end: grid -->
</x-app-layout>
