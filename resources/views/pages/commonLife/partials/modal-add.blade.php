{{-- Add a new task --}}
    <div class="card">
        <div class="card-body">
            {{-- Add button--}}
            <button class="btn btn-outline btn-primary" data-modal-toggle="#modal_add">
                Ajouter
            </button>
        </div>
        {{-- Form that appears when you click on the "Add" button --}}
        <div class="modal" data-modal="true" id="modal_add">
            <div class="modal-content max-w-[600px] top-[10%]">
                <div class="card-header">
                    {{-- Form title --}}
                    <h3 class="modal-title">
                        Ajouter une tâche
                    </h3>
                    <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
                        <i class="ki-outline ki-cross">
                        </i>
                    </button>
                </div>
                <form method="POST" action="{{route('common-life.store')}}">
                    <div class="card-body flex flex-col gap-5">
                        {{-- Form to add a new task --}}
                        @csrf
                        <x-forms.input name="title" type="text" :label="__('Titre')"/>

                        <x-forms.input name="description" type="text" :label="__('Description')"/>
                    </div>
                    <div class="card-footer justify-end">
                        <div class="flex gap-4">
                            {{-- Cancel button --}}
                            <button type="button" class="btn btn-light" data-modal-dismiss="true">
                                Annuler
                            </button>
                            {{-- Validate button --}}
                            <x-forms.primary-button class="btn btn-outline btn-primary">
                                {{ __('Ajouter') }}
                            </x-forms.primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
