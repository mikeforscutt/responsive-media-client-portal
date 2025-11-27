<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create 8–10 clients
        Client::factory()
            ->count(10)
            ->create()
            ->each(function (Client $client) {
                // 1–5 projects per client
                Project::factory()
                    ->count(fake()->numberBetween(1, 5))
                    ->create([
                        'client_id' => $client->id,
                    ]);
            });
    }
}
