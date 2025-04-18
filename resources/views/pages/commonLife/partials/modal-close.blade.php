{{-- Form that appears when you click on the "Close" button --}}
<div class="modal" data-modal="true" id="modal_close_{{ $commonLife->task_id }}">
    <div class="modal-content max-w-[600px] top-[10%]">
        <div class="card-header">
            {{-- Form title --}}
            <h3 class="modal-title">
                Clôturer la tâche
            </h3>
            <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
                <i class="ki-outline ki-cross">
                </i>
            </button>
        </div>
        <div class="card-body">
            {{-- Confirmation question --}}
            <div>
                Voulez-vous vraiment clôturer cette tâche ?
            </div>
        </div>
        <div class="card-footer justify-end">
            <div class="flex gap-4">
                {{-- Cancel button --}}
                <button type="button" class="btn btn-light" data-modal-dismiss="true">
                    Annuler
                </button>
                <form action="{{ route('common-life.close', ['commonLife' => $commonLife->task_id])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    {{-- Close button --}}
                    <button type="submit" class="btn btn-outline btn-warning">
                        Clôturer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
