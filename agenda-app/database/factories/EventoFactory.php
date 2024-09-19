<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'data' => $this->faker->date(),
            'descricao' => $this->faker->sentence(),
            'inicio' => $this->faker->time('H:i'),
            'final' => $this->faker->time('H:i'),
            'contato' => $this->faker->firstName(),
            'realizado' => $this->faker->boolean()
        ];
    }
}
