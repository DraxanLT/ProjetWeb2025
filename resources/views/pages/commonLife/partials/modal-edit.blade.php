{{-- Form that appears when you click on the "Edit" button --}}
<div class="modal" data-modal="true" id="modal_edit_{{ $commonLife->task_id }}">
    <div class="modal-content max-w-[600px] top-[10%]">
        <div class="card-header">
            {{-- Form title --}}
            <h3 class="modal-title">
                Modifier la tâche
            </h3>
            <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
                <i class="ki-outline ki-cross">
                </i>
            </button>
        </div>
        <form method="POST" action="{{route('common-life.update', ['commonLife' => $commonLife->task_id])}}">
            <div class="card-body flex flex-col gap-5">
                {{-- Form to edit a task --}}
                @csrf
                @method('PUT')
                <x-forms.input name="title" type="text" :label="__('Titre')" :value="$commonLife->title"/>

                <x-forms.input name="description" type="text" :label="__('Description')" :value="$commonLife->description"/>
            </div>
            <div class="card-footer justify-end">
                <div class="flex gap-4">
                    {{-- Cancel button --}}
                    <button class="btn btn-light" data-modal-dismiss="true">
                        Annuler
                    </button>
                    {{-- Validate button --}}
                    <x-forms.primary-button>
                        {{ __('Modifier') }}
                    </x-forms.primary-button>
                </div>
            </div>
        </form>
    </div>
</div>
