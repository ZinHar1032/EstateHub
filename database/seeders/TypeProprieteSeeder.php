<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypePropriete;

class TypeProprieteSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['nom_type' => 'Appartement', 'description' => 'Appartement standard', 'actif' => true],
            ['nom_type' => 'Villa', 'description' => 'Villa avec jardin/piscine', 'actif' => true],
            ['nom_type' => 'Studio', 'description' => 'Studio compact', 'actif' => true],
        ];

        foreach ($types as $t) {
            TypePropriete::updateOrCreate(['nom_type' => $t['nom_type']], $t);
        }
    }
}
