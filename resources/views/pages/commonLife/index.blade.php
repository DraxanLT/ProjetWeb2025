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
                @forelse($commonLifes as $commonLife)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ $commonLife->title }}
                            </h3>
                        </div>
                        <div class="card-body">
                            {{ $commonLife->description }}
                        </div>
                        <div class="card-footer justify-center">
                            <div class="btn-group gap-2">
                                <form>
                                    <button type="submit"  class="btn btn-primary">
                                        Pointer
                                    </button>
                                </form>
                                <form>
                                    <button type="submit" class="btn btn-primary">
                                        Modifier
                                    </button>
                                </form>
                                <form action="{{ route('common-life.destroy', ['commonLife' => $commonLife->task_id]) }}" method="POST"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette tâche ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <h2 class="card-body">Pas de tâche pour le moment :(</h2>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="card h-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter une tâche commune
                    </h3>
                </div>
                <form method="POST" action="{{route('common-life.store')}}">
                    <div class="card-body flex flex-col gap-5">
                        @csrf
                        @if(session('success'))
                            <div role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <x-forms.input name="title" type="text" :label="__('Titre')" />

                        <x-forms.input name="description" type="text" :label="__('Description')" />

                        <x-forms.primary-button>
                            {{ __('Valider') }}
                        </x-forms.primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
