<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    $statuses = ['planned', 'in_progress', 'live', 'on_hold'];

    return [
        'client_id'   => null, // we’ll set this in the seeder
        'name'        => $this->faker->catchPhrase(),
        'status'      => $this->faker->randomElement($statuses),
        'tech_stack'  => $this->faker->randomElement([
            'Laravel + Livewire',
            'Laravel + React',
            'WordPress + WooCommerce',
            'PrestaShop + SCSS',
        ]),
        'monthly_fee' => $this->faker->randomElement([150, 250, 350, 500, 750, 1000]),
        'launched_at' => $this->faker->optional()->dateTimeBetween('-2 years', 'now'),
        'notes'       => $this->faker->sentence(10),
    ];
}
}
