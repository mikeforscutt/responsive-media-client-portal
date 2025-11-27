<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Client $client)
    {
        // Not really needed because we show projects on the client page,
        // but required by the resource route.
        return redirect()->route('clients.show', $client);
    }

    public function create(Client $client)
    {
        return view('projects.create', compact('client'));
    }

    public function store(Request $request, Client $client)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'status'      => ['required', 'in:planned,in_progress,live,on_hold'],
            'tech_stack'  => ['nullable', 'string', 'max:255'],
            'monthly_fee' => ['nullable', 'numeric', 'min:0'],
            'launched_at' => ['nullable', 'date'],
            'notes'       => ['nullable', 'string'],
        ]);

        $data['client_id'] = $client->id;

        Project::create($data);

        return redirect()
            ->route('clients.show', $client)
            ->with('success', 'Project created.');
    }

    public function show(Project $project)
    {
        $project->load('client');

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $client = $project->client;

        return view('projects.edit', compact('project', 'client'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'status'      => ['required', 'in:planned,in_progress,live,on_hold'],
            'tech_stack'  => ['nullable', 'string', 'max:255'],
            'monthly_fee' => ['nullable', 'numeric', 'min:0'],
            'launched_at' => ['nullable', 'date'],
            'notes'       => ['nullable', 'string'],
        ]);

        $project->update($data);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $client = $project->client;
        $project->delete();

        return redirect()
            ->route('clients.show', $client)
            ->with('success', 'Project deleted.');
    }
}
