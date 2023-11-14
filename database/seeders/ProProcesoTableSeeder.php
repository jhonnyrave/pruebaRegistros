<?php

namespace Database\Seeders;

use App\Models\ProProceso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProProcesoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProProceso::factory()->count(5)->create();
    }
}