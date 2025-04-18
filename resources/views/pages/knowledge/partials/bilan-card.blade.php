<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{-- Bilan title --}}
            {{ $knowledge->title }} - <span class="text-xs text-gray-500">créée le {{ $knowledge->created_at->format('d/m/Y à H:i') }}</span>
        </h3>
    </div>
    <div class="card-body">
        {{-- Bilan informations --}}
        <div>
            Nombre de questions : {{ $knowledge->questions_nbr }}
        </div>
        <div>
            Langages : {{ implode(' - ', $knowledge->languages) }}
        </div>
    </div>
    <div class="card-footer justify-center">
        <div class="btn-group gap-2">
            {{-- Notify button --}}
            <a class="btn btn-outline btn-success" href="{{ route('knowledge.fill', $knowledge->id) }}">
                Remplir le bilan
            </a>
            @if(auth()->user()->is_admin)
                {{-- Delete button --}}
                <button class="btn btn-outline btn-danger" data-modal-toggle="#modal_delete_{{ $knowledge->id }}">
                    Supprimer
                </button>
            @endif
        </div>
    </div>
</div>

{{-- Modal inclusions --}}
@include('pages.knowledge.partials.modal-delete', ['knowledge' => $knowledge])
