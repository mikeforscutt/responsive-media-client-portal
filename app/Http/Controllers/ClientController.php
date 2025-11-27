<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function dashboard()
    {
        $totalClients   = Client::count();
        $totalProjects  = Project::count();
        $liveProjects   = Project::where('status', 'live')->count();
        $monthlyRevenue = Project::sum('monthly_fee');

        $recentProjects = Project::with('client')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalClients',
            'totalProjects',
            'liveProjects',
            'monthlyRevenue',
            'recentProjects'
        ));
    }

    public function index()
    {
        $clients = Client::withCount('projects')
            ->latest()
            ->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'company_name'  => ['nullable', 'string', 'max:255'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'website_url'   => ['nullable', 'url', 'max:255'],
            'notes'         => ['nullable', 'string'],
        ]);

        Client::create($data);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client created.');
    }

    public function show(Client $client)
    {
        $client->load('projects');

        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'company_name'  => ['nullable', 'string', 'max:255'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'website_url'   => ['nullable', 'url', 'max:255'],
            'notes'         => ['nullable', 'string'],
        ]);

        $client->update($data);

        return redirect()
            ->route('clients.show', $client)
            ->with('success', 'Client updated.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client deleted.');
    }
}
