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
            {{-- Notify button --}}
            <button type="submit"  class="btn btn-primary">
                Notifier
            </button>
            {{-- Edit button --}}
            <button class="btn btn-primary" data-modal-toggle="#modal_edit_{{ $commonLife->task_id }}">
                Modifier
            </button>
            {{-- Delete button --}}
            <button class="btn btn-primary" data-modal-toggle="#modal_delete_{{ $commonLife->task_id }}">
                Supprimer
            </button>
        </div>
    </div>
</div>


{{-- Modal inclusions --}}
@include('pages.commonLife.partials.modal-edit', ['commonLife' => $commonLife])
@include('pages.commonLife.partials.modal-delete', ['commonLife' => $commonLife])
