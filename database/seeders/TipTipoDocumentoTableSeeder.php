<?php

namespace Database\Seeders;

use App\Models\TipTipoDocumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipTipoDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipTipoDocumento::factory()->count(5)->create();
    }
}