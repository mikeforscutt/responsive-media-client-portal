<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Clients
            </h2>
            <a href="{{ route('clients.create') }}"
               class="inline-flex items-center px-4 py-2 border rounded-md text-sm">
                + New Client
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">Name</th>
                            <th class="text-left py-2">Company</th>
                            <th class="text-left py-2">Projects</th>
                            <th class="text-right py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr class="border-b">
                                <td class="py-2">{{ $client->name }}</td>
                                <td class="py-2">{{ $client->company_name }}</td>
                                <td class="py-2">{{ $client->projects_count }}</td>
                                <td class="py-2 text-right">
                                    <a href="{{ route('clients.show', $client) }}" class="underline text-blue-600">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
