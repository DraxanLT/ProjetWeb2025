<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ $knowledge->title }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="card">
        <div class="card-body">
            {{-- Bilan questions --}}
            <form method="POST" action="{{ route('knowledge.submit', $knowledge) }}">
                @csrf
                @foreach ($questions as $question)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ $question->question_text }}
                            </h3>
                        </div>
                        <div class="card-body">
                            {{-- answer possibilities --}}
                            @foreach ($question->choices as $choice)
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $choice }}" class="checkbox" />
                                    <span>{{ $choice }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                {{-- Validate button --}}
                <x-forms.primary-button class="btn btn-outline btn-primary">
                    Valider
                </x-forms.primary-button>
            </form>
        </div>
    </div>

    <!-- end: grid -->
</x-app-layout>
