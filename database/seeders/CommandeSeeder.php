<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\commande;

class CommandeSeeder extends Seeder
{

    public function run(): void
    {
        commande::factory()->count(15)->create();
    }
}
