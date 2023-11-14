<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TipTipoDocumento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipTipoDocumento>
 */
class TipTipoDocumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    
        $tipNombre = strtoupper($this->faker->word);
        // Generar el prefijo basándose en las tres primeras letras del nombre
        $tipPrefijo = strtoupper(substr(Str::slug($tipNombre), 0, 3));

        // Asegurar que el prefijo generado sea único
        while (TipTipoDocumento::where('tip_prefijo', $tipPrefijo)->exists()) {
            $tipPrefijo = strtoupper(substr(Str::slug($this->faker->word), 0, 3));
        }

        return [
            'tip_nombre' => $tipNombre,
            'tip_prefijo' => $tipPrefijo,
        ];
    }
}