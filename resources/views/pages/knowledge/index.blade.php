<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Bilans de connaissances') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid gap-2">
                {{-- List of all tests --}}
                @forelse($knowledgeTests as $knowledge)
                    @include('pages.knowledge.partials.bilan-card', ['$knowledgeTest' => $knowledge])
                @empty
                    {{-- Card that says there is no test currently --}}
                    <div class="card">
                        <div class="card-body">
                            Pas de bilan pour le moment :(
                        </div>
                    </div>
                @endforelse
                @if(auth()->user()->is_admin)
                    @include('pages.knowledge.partials.modal-add')
                @endif
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="grid gap-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Tempo 2
                        </h3>
                    </div>
                    <div class="card-body">
                        :)
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
