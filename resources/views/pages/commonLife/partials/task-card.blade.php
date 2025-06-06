<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{-- Task title --}}
            {{ $commonLife->title }} - <span class="text-xs text-gray-500">créée le {{ $commonLife->created_at->format('d/m/Y à H:i') }}</span>
        </h3>
    </div>
    <div class="card-body">
        {{-- Task description --}}
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
                <div class="accordion-content hidden" id="accordion_content_{{ $commonLife->task_id }}">
                    <div class="grid gap-1">
                        @forelse($commonLife->comments as $comment)
                            <div class="card">
                                <div class="card-body">
                                    {{-- Notification that indicates the name of the participant with the date and time of his participation --}}
                                    <div>
                                        {{ $comment->user->first_name }} a participé à la tâche - <span class="text-xs text-gray-500">{{ $comment->created_at->format('d/m/Y à H:i') }}</span>
                                    </div>
                                    <p class="text-gray-600">{{ $comment->comment }}</p>
                                </div>
                                {{-- Comment buttons --}}
                                @if(auth()->id() === $comment->user_id || auth()->user()->is_admin)
                                <div class="card-footer">
                                    @if(empty($comment->comment) && auth()->id() === $comment->user_id)
                                        <button class="btn btn-outline btn-primary" data-modal-toggle="#modal_add_comment_{{ $comment->id }}">
                                            Ajouter un commentaire
                                        </button>
                                        @if(isset($comment))
                                            @include('pages.commonLife.partials.modal-add-comment', ['commonLife' => $commonLife, 'comment' => $comment])
                                        @endif
                                    @endif
                                        <button class="btn btn-outline btn-danger" data-modal-toggle="#modal_delete_comment_{{ $comment->id }}">
                                            Supprimer
                                        </button>
                                        @if(isset($comment))
                                            @include('pages.commonLife.partials.modal-delete_comment', ['commonLife' => $commonLife, 'comment' => $comment])
                                        @endif
                                </div>
                                @endif
                            </div>
                        @empty
                            {{-- Message that appears when there is no participation yet --}}
                            <div class="card">
                                <div class="card-body">
                                    Aucune participation pour le moment :(
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer justify-center">
        <div class="btn-group gap-2">
            @if(auth()->user()->is_admin)
                {{-- Close button (placeholder) --}}
                <button class="btn btn-outline btn-warning" data-modal-toggle="#modal_close_{{ $commonLife->task_id }}">
                    Clôturer
                </button>
            @endif
            {{-- Notify button --}}
            <button class="btn btn-outline btn-success" data-modal-toggle="#modal_notify_{{ $commonLife->task_id }}">
                Participer
            </button>
            @if(auth()->user()->is_admin)
                {{-- Edit button --}}
                <button class="btn btn-outline btn-primary" data-modal-toggle="#modal_edit_{{ $commonLife->task_id }}">
                    Modifier
                </button>
                {{-- Delete button --}}
                <button class="btn btn-outline btn-danger" data-modal-toggle="#modal_delete_{{ $commonLife->task_id }}">
                    Supprimer
                </button>
            @endif
        </div>
    </div>
</div>

{{-- Modal inclusions --}}
@include('pages.commonLife.partials.modal-edit', ['commonLife' => $commonLife])
@include('pages.commonLife.partials.modal-delete', ['commonLife' => $commonLife])
@include('pages.commonLife.partials.modal-notify', ['commonLife' => $commonLife])
@include('pages.commonLife.partials.modal-close', ['commonLife' => $commonLife])
