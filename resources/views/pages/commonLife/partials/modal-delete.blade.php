{{-- Form that appears when you click on the "Delete" button --}}
<div class="modal" data-modal="true" id="modal_delete_{{ $commonLife->task_id }}">
    <div class="modal-content max-w-[600px] top-[10%]">
        <div class="card-header">
            {{-- Form title --}}
            <h3 class="modal-title">
                Supprimer la tâche
            </h3>
            <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
                <i class="ki-outline ki-cross">
                </i>
            </button>
        </div>
        <div class="card-body">
            {{-- Confirmation question --}}
            <div>
                Voulez-vous vraiment supprimer cette tâche ?
            </div>
        </div>
        <div class="card-footer justify-end">
            <div class="flex gap-4">
                {{-- Cancel button --}}
                <button type="button" class="btn btn-light" data-modal-dismiss="true">
                    Annuler
                </button>
                <form action="{{ route('common-life.destroy', ['commonLife' => $commonLife->task_id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- Delete button --}}
                    <button type="submit" class="btn btn-primary">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
