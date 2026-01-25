<?php

namespace Database\Seeders;

use App\Models\CategoriePropriete;
use Illuminate\Database\Seeder;

class CategorieProprieteSeeder extends Seeder
{
    public function run(): void
    {
        $cats = [
            ['nom_categorie' => 'Vente', 'actif' => true, 'dispo' => true],
            ['nom_categorie' => 'Location', 'actif' => true, 'dispo' => true],
            ['nom_categorie' => 'Luxe', 'actif' => true, 'dispo' => true],
        ];

        foreach ($cats as $c) {
            CategoriePropriete::updateOrCreate(['nom_categorie' => $c['nom_categorie']], $c);
        }
    }
}
