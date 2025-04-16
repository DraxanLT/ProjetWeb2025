<div data-accordion="true">
    <div class="accordion-item [&:not(:last-child)]:border-b border-b-gray-200" data-accordion-item="true" id="accordion_item_completed_tasks">
        <button class="accordion-toggle py-4 group" data-accordion-toggle="#accordion_content_completed_tasks">
            <span class="text-base text-gray-900 font-medium">
                ...
            </span>
            <i class="ki-outline ki-plus text-gray-600 text-2sm accordion-active:hidden block"></i>
            <i class="ki-outline ki-minus text-gray-600 text-2sm accordion-active:block hidden"></i>
        </button>
        <div class="accordion-content hidden" id="accordion_content_completed_tasks">
            <div class="grid gap-1">
                @forelse($completedTasks as $completedTask)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{-- Task title --}}
                                {{ $completedTask->title }} - <span class="text-xs text-gray-500">créée le {{ $completedTask->created_at->format('d/m/Y à H:i') }}</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            {{-- Task description --}}
                            {{ $completedTask->description }}
                        </div>
                    </div>
                @empty
                    {{-- Card that says there is no task in progress --}}
                    <div class="card">
                        <div class="card-body">
                            Pas de tâche pour le moment :(
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
