{{-- Add a new knowledge test --}}
<div class="card">
    <div class="card-body">
        {{-- Add button--}}
        <button class="btn btn-outline btn-primary" data-modal-toggle="#modal_add">
            Créer un bilan
        </button>
    </div>
    {{-- Form that appears when you click on the "Add" button --}}
    <div class="modal" data-modal="true" id="modal_add">
        <div class="modal-content max-w-[600px] top-[10%]">
            <div class="card-header">
                {{-- Form title --}}
                <h3 class="modal-title">
                    Créer un nouveau bilan
                </h3>
                <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
                    <i class="ki-outline ki-cross">
                    </i>
                </button>
            </div>
            <form method="POST" action="{{ route('knowledge.store') }}">
                <div class="card-body flex flex-col gap-5">
                    {{-- Form to add a new test --}}
                    @csrf
                    <x-forms.input name="title" type="text" :label="__('Titre du bilan')"/>
                    {{-- Checkboxes to select the languages for the test --}}
                    <div class="mb-4">
                        <label class="form-label text-sm text-gray-700 dark:text-gray-300 mb-2">
                            Langages à évaluer
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach(['Python', 'Java', 'HTML', 'CSS', 'SQL', 'PHP', 'JavaScript', 'C#'] as $language)
                                <label class="form-check form-check-custom form-check-solid flex items-center gap-2">
                                    <input class="checkbox form-check-input" type="checkbox" name="languages[]" value="{{ $language }}" />
                                    <span class="form-check-label text-sm text-gray-200">
                                        {{ $language }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <x-forms.input name="questions_nbr" type="text" :label="__('Nombre de questions')"/>

                    <x-forms.input name="answers_nbr" type="text" :label="__('Nombre de réponses par question')"/>
                </div>
                <div class="card-footer justify-end">
                    <div class="flex gap-4">
                        {{-- Cancel button --}}
                        <button type="button" class="btn btn-light" data-modal-dismiss="true">
                            Annuler
                        </button>
                        {{-- Validate button --}}
                        <x-forms.primary-button class="btn btn-outline btn-primary">
                            {{ __('Générer le bilan') }}
                        </x-forms.primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
