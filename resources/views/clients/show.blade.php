<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ $client->name }}
            </h2>
            <div class="flex items-center gap-2 px-2">
                <a href="{{ route('clients.edit', $client) }}" class="text-sm underline">Edit</a>
                <form method="POST" action="{{ route('clients.destroy', $client) }}"
                      onsubmit="return confirm('Delete this client?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-sm text-red-600 underline">Delete</button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="grid sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <div class="font-semibold">Company</div>
                        <div>{{ $client->company_name ?: '—' }}</div>
                    </div>
                    <div>
                        <div class="font-semibold">Email</div>
                        <div>{{ $client->contact_email ?: '—' }}</div>
                    </div>
                    <div>
                        <div class="font-semibold">Website</div>
                        <div>
                            @if ($client->website_url)
                                <a href="{{ $client->website_url }}" target="_blank" class="underline">
                                    {{ $client->website_url }}
                                </a>
                            @else
                                —
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="font-semibold">Notes</div>
                        <div>{{ $client->notes ?: '—' }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold">Projects</h3>
                    <a href="{{ route('clients.projects.create', $client) }}"
                        class="inline-flex items-center px-3 py-1 border rounded-md text-sm">
                        + New Project
                    </a>
                </div>

                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">Name</th>
                            <th class="text-left py-2">Status</th>
                            <th class="text-right py-2">Monthly fee</th>
                            <th class="text-right py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($client->projects as $project)
                            <tr class="border-b">
                                <td class="py-2">
                                    <a href="{{ route('projects.show', $project) }}" class="underline">
                                        {{ $project->name }}
                                    </a>
                                </td>
                                <td class="py-2 capitalize">
                                    {{ str_replace('_', ' ', $project->status) }}
                                </td>
                                <td class="py-2 text-right">
                                    £{{ number_format($project->monthly_fee, 2) }}
                                </td>
                                <td class="py-2 text-right">
                                    <a href="{{ route('projects.edit', $project) }}" class="text-sm underline">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-500">
                                    No projects yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
