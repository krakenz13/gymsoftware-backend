<?php

namespace Database\Factories;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'foto' => $this->faker->imageUrl,
            'cedula' => $this->faker->unique()->numerify('#######'), 
            'telefono' => $this->faker->phoneNumber,
        ];
    }
}
