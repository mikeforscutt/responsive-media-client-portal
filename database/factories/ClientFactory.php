<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
  public function definition(): array
{
    return [
        'name'          => $this->faker->name(),
        'company_name'  => $this->faker->company(),
        'contact_email' => $this->faker->unique()->safeEmail(),
        'website_url'   => $this->faker->url(),
        'notes'         => $this->faker->sentence(8),
    ];
}

}
