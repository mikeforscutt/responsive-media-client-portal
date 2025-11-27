<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-white shadow-sm sm:rounded-lg p-4">
                    <div class="text-sm text-gray-500">Clients</div>
                    <div class="text-2xl font-semibold">{{ $totalClients }}</div>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg p-4">
                    <div class="text-sm text-gray-500">Projects</div>
                    <div class="text-2xl font-semibold">{{ $totalProjects }}</div>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg p-4">
                    <div class="text-sm text-gray-500">Live projects</div>
                    <div class="text-2xl font-semibold">{{ $liveProjects }}</div>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg p-4">
                    <div class="text-sm text-gray-500">Monthly revenue</div>
                    <div class="text-2xl font-semibold">£{{ number_format($monthlyRevenue, 2) }}</div>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-semibold mb-4">Recent projects</h3>
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">Project</th>
                            <th class="text-left py-2">Client</th>
                            <th class="text-left py-2">Status</th>
                            <th class="text-right py-2">Monthly fee</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentProjects as $project)
                            <tr class="border-b">
                                <td class="py-2">
                                    <a href="{{ route('projects.show', $project) }}" class="underline">
                                        {{ $project->name }}
                                    </a>
                                </td>
                                <td class="py-2">{{ $project->client->name }}</td>
                                <td class="py-2 capitalize">{{ str_replace('_', ' ', $project->status) }}</td>
                                <td class="py-2 text-right">£{{ number_format($project->monthly_fee, 2) }}</td>
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
