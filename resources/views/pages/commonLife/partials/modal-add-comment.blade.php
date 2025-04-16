{{-- Form that appears when you click on the "Add a comment" button --}}
<div class="modal" data-modal="true" id="modal_add_comment_{{ $comment->id }}">
    <div class="modal-content max-w-[600px] top-[10%]">
        <div class="card-header">
            {{-- Form title --}}
            <h3 class="modal-title">
                Ajouter un commentaire
            </h3>
            <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
                <i class="ki-outline ki-cross">
                </i>
            </button>
        </div>
        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
            <div class="card-body flex flex-col gap-5">
                {{-- Form to add a comment --}}
                @csrf
                @method('PATCH')
                <x-forms.input name="comment" type="text" :label="__('Commentaire')"/>
            </div>
            <div class="card-footer justify-end">
                <div class="flex gap-4">
                    {{-- Cancel button --}}
                    <button type="button" class="btn btn-light" data-modal-dismiss="true">
                        Annuler
                    </button>
                    {{-- Validate button --}}
                    <x-forms.primary-button class="btn btn-outline btn-primary">
                        {{ __('Ajouter un commentaire') }}
                    </x-forms.primary-button>
                </div>
            </div>
        </form>
    </div>
</div>
