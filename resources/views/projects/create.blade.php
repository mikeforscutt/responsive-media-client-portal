<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            New Project for {{ $client->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('clients.projects.store', $client) }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="mt-1 block w-full border rounded-md p-2">
                        @error('name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" class="mt-1 block w-full border rounded-md p-2">
                            @foreach (['planned','in_progress','live','on_hold'] as $status)
                                <option value="{{ $status }}" @selected(old('status') === $status)>
                                    {{ ucfirst(str_replace('_', ' ', $status)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tech stack</label>
                        <input type="text" name="tech_stack" value="{{ old('tech_stack') }}"
                               class="mt-1 block w-full border rounded-md p-2"
                               placeholder="e.g. Laravel + Alpine.js">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Monthly fee (£)</label>
                        <input type="number" step="0.01" name="monthly_fee" value="{{ old('monthly_fee', 0) }}"
                               class="mt-1 block w-full border rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Launched at</label>
                        <input type="date" name="launched_at" value="{{ old('launched_at') }}"
                               class="mt-1 block w-full border rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Notes</label>
                        <textarea name="notes" rows="4"
                                  class="mt-1 block w-full border rounded-md p-2">{{ old('notes') }}</textarea>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('clients.show', $client) }}" class="text-sm text-gray-600">Cancel</a>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
