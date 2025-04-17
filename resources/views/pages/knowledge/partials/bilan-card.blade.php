<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{-- Bilan title --}}
            {{ $commonLife->title }} - <span class="text-xs text-gray-500">créée le {{ $commonLife->created_at->format('d/m/Y à H:i') }}</span>
        </h3>
    </div>
    <div class="card-body">
        {{-- Bilan description --}}
        {{ $commonLife->description }}
    </div>
    <hr>
    {{-- Accordion for participations and comments of participants--}}
    <div class="card-body">
        <div data-accordion="true">
            <div class="accordion-item [&:not(:last-child)]:border-b border-b-gray-200" data-accordion-item="true" id="accordion_item_{{ $commonLife->task_id }}">
                <button class="accordion-toggle py-4 group" data-accordion-toggle="#accordion_content_{{ $commonLife->task_id }}">
                    <span class="text-base text-gray-900 font-medium">
                        Participations ({{ $commonLife->comments->count() }})
                    </span>
                    <i class="ki-outline ki-plus text-gray-600 text-2sm accordion-active:hidden block"></i>
                    <i class="ki-outline ki-minus text-gray-600 text-2sm accordion-active:block hidden"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="card-footer justify-center">
        <div class="btn-group gap-2">
            {{-- Notify button --}}
            <button class="btn btn-outline btn-success" data-modal-toggle="#modal_notify_{{ $commonLife->task_id }}">
                Remplir le bilan
            </button>
            @if(auth()->user()->is_admin)
                {{-- Delete button --}}
                <button class="btn btn-outline btn-danger" data-modal-toggle="#modal_delete_{{ $commonLife->task_id }}">
                    Supprimer
                </button>
            @endif
        </div>
    </div>
</div>


{{-- Modal inclusions --}}

