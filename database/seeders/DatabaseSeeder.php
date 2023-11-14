<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProProceso;
use App\Models\TipTipoDocumento;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        $this->call(ProProcesoTableSeeder::class);
        $this->call(TipTipoDocumentoTableSeeder::class);
    }
}