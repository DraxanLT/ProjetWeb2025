{{-- Form that appears when you click on the "Notify" button --}}
<div class="modal" data-modal="true" id="modal_notify_{{ $commonLife->task_id }}">
    <div class="modal-content max-w-[600px] top-[10%]">
        <div class="card-header">
            {{-- Form title --}}
            <h3 class="modal-title">
                Participer à cette tâche
            </h3>
            <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
                <i class="ki-outline ki-cross">
                </i>
            </button>
        </div>
        <form method="POST" action="{{route('comments.store')}}">
            <div class="card-body flex flex-col gap-5">
                {{-- Form to notify the completed task --}}
                @csrf
                {{-- Explanations --}}
                <div>
                    Vous avez participé à cette tâche ? Vous pouvez mettre un commentaire expliquant ce que vous avez fait. Une fois votre commentaire posté, il ne sera pas possible de le modifier.
                </div>

                <input type="hidden" name="task_id" value="{{ $commonLife->task_id }}">

                <x-forms.input name="comment" type="text" :label="__('Commentaire (facultatif)')" />
            </div>
            <div class="card-footer justify-end">
                <div class="flex gap-4">
                    {{-- Cancel button --}}
                    <button type="button" class="btn btn-light" data-modal-dismiss="true">
                        Annuler
                    </button>
                    {{-- Validate button --}}
                    <x-forms.primary-button class="btn btn-outline btn-success">
                        {{ __('Participer') }}
                    </x-forms.primary-button>
                </div>
            </div>
        </form>
    </div>
</div>
