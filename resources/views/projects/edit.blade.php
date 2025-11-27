<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Project – {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-xl p-8">
                <form method="POST" action="{{ route('projects.update', $project) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ old('name', $project->name) }}"
                               class="mt-1 block w-full border rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" class="mt-1 block w-full border rounded-md p-2">
                            @foreach (['planned','in_progress','live','on_hold'] as $status)
                                <option value="{{ $status }}" @selected(old('status', $project->status) === $status)>
                                    {{ ucfirst(str_replace('_', ' ', $status)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tech stack</label>
                        <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}"
                               class="mt-1 block w-full border rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Monthly fee (£)</label>
                        <input type="number" step="0.01" name="monthly_fee"
                               value="{{ old('monthly_fee', $project->monthly_fee) }}"
                               class="mt-1 block w-full border rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Launched at</label>
                        <input type="date" name="launched_at"
                               value="{{ old('launched_at', optional($project->launched_at)->format('Y-m-d')) }}"
                               class="mt-1 block w-full border rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Notes</label>
                        <textarea name="notes" rows="4"
                                  class="mt-1 block w-full border rounded-md p-2">{{ old('notes', $project->notes) }}</textarea>
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <a href="{{ route('projects.show', $project) }}"
                            class="text-sm text-gray-600 hover:text-gray-900 underline">
                            Cancel
                        </a>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
