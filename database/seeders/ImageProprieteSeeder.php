<?php

namespace Database\Seeders;

use App\Models\ImagePropriete;
use App\Models\Propriete;
use Illuminate\Database\Seeder;

class ImageProprieteSeeder extends Seeder
{
    public function run(): void
    {
        $appart = Propriete::where('titre', 'Appartement moderne au centre-ville')->first();
        $villa = Propriete::where('titre', 'Villa avec piscine et jardin')->first();

        if ($appart) {
            ImagePropriete::create([
                'propriete_id' => $appart->id,
                'chemin_image' => 'images/proprietes/appart1_1.jpg',
                'principale' => true,
                'ordre' => 1,
            ]);

            ImagePropriete::create([
                'propriete_id' => $appart->id,
                'chemin_image' => 'images/proprietes/appart1_2.jpg',
                'principale' => false,
                'ordre' => 2,
            ]);
        }

        if ($villa) {
            ImagePropriete::create([
                'propriete_id' => $villa->id,
                'chemin_image' => 'images/proprietes/villa1_1.jpg',
                'principale' => true,
                'ordre' => 1,
            ]);

            ImagePropriete::create([
                'propriete_id' => $villa->id,
                'chemin_image' => 'images/proprietes/villa1_2.jpg',
                'principale' => false,
                'ordre' => 2,
            ]);
        }
    }
}
