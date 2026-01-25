<?php

namespace Database\Seeders;

use App\Models\TypePropriete;
use Illuminate\Database\Seeder;

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
