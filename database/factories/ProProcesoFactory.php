<?php

namespace Database\Factories;

use App\Models\ProProceso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProProceso>
 */
class ProProcesoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $proNombre = strtoupper($this->faker->word);

        // Generar el prefijo basándose en las tres primeras letras del nombre
        $proPrefijo = strtoupper(substr(Str::slug($proNombre), 0, 3));

        // Asegurar que el prefijo generado sea único
        while (ProProceso::where('pro_prefijo', $proPrefijo)->exists()) {
            $proPrefijo = strtoupper(substr(Str::slug($this->faker->word), 0, 3));
        }

        return [
            'pro_nombre' => $proNombre,
            'pro_prefijo' => $proPrefijo,
        ];
    }
}