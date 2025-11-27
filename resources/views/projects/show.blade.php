<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800">
                    {{ $project->name }}
                </h2>
                <p class="text-sm text-gray-500">
                    {{ $project->client->name }}
                </p>
            </div>
            <div class="flex items-center gap-2 px-2">
                <a href="{{ route('projects.edit', $project) }}" class="text-sm underline">Edit</a>
                <form method="POST" action="{{ route('projects.destroy', $project) }}"
                      onsubmit="return confirm('Delete this project?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-sm text-red-600 underline">Delete</button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white shadow-sm sm:rounded-lg p-6 text-sm space-y-3">
                <div>
                    <div class="font-semibold">Status</div>
                    <div class="capitalize">{{ str_replace('_', ' ', $project->status) }}</div>
                </div>

                <div>
                    <div class="font-semibold">Tech stack</div>
                    <div>{{ $project->tech_stack ?: '—' }}</div>
                </div>

                <div>
                    <div class="font-semibold">Monthly fee</div>
                    <div>£{{ number_format($project->monthly_fee, 2) }}</div>
                </div>

                <div>
                    <div class="font-semibold">Launched at</div>
                    <div>{{ $project->launched_at?->format('d M Y') ?? '—' }}</div>
                </div>

                <div>
                    <div class="font-semibold">Notes</div>
                    <div>{{ $project->notes ?: '—' }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
