<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            New Client
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('clients.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="mt-1 block w-full border rounded-md p-2">
                        @error('name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Company</label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}"
                               class="mt-1 block w-full border rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="contact_email" value="{{ old('contact_email') }}"
                               class="mt-1 block w-full border rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Website</label>
                        <input type="url" name="website_url" value="{{ old('website_url') }}"
                               class="mt-1 block w-full border rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Notes</label>
                        <textarea name="notes" rows="4"
                                  class="mt-1 block w-full border rounded-md p-2">{{ old('notes') }}</textarea>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('clients.index') }}" class="text-sm text-gray-600">Cancel</a>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
