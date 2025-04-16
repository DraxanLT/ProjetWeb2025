<div data-accordion="true">
    <div class="accordion-item [&:not(:last-child)]:border-b border-b-gray-200" data-accordion-item="true"
         id="accordion_item_individual_completed_tasks">
        <button class="accordion-toggle py-4 group"
                data-accordion-toggle="#accordion_content_individual_completed_tasks">
            <span class="text-base text-gray-900 font-medium">
                Vos tâches
            </span>
            <i class="ki-outline ki-plus text-gray-600 text-2sm accordion-active:hidden block"></i>
            <i class="ki-outline ki-minus text-gray-600 text-2sm accordion-active:block hidden"></i>
        </button>
        <div class="accordion-content hidden" id="accordion_content_individual_completed_tasks">
            <div class="grid gap-1">
                @forelse($participatedTasks as $lastParticipatedTask)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{-- Task title --}}
                                {{ $lastParticipatedTask->title }} - <span class="text-xs text-gray-500">dernière participation le {{ $lastParticipatedTask->lastParticipationDate(auth()->id())?->format('d/m/Y à H:i') }}</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            {{-- Task description --}}
                            {{ $lastParticipatedTask->description }}
                        </div>
                    </div>
                @empty
                    {{-- Card that says there is no task completed --}}
                    <div class="card">
                        <div class="card-body">
                            Vous n'avez encore rien fait :(
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
