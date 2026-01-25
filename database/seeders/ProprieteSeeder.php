<?php

namespace Database\Seeders;

use App\Models\CategoriePropriete;
use App\Models\Propriete;
use App\Models\TypePropriete;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProprieteSeeder extends Seeder
{
    public function run(): void
    {
        // Agent propriétaire des biens
        $agent = User::where('role', 'agent')->firstOrFail();

        // Types
        $typeAppartement = TypePropriete::where('nom_type', 'Appartement')->firstOrFail();
        $typeVilla = TypePropriete::where('nom_type', 'Villa')->firstOrFail();

        // Catégories
        $catVente = CategoriePropriete::where('nom_categorie', 'Vente')->firstOrFail();
        $catLuxe = CategoriePropriete::where('nom_categorie', 'Luxe')->firstOrFail();

        // ======================
        // APPARTEMENTS
        // ======================

        Propriete::updateOrCreate(
            ['titre' => 'Appartement moderne au centre-ville'],
            [
                'description' => 'Appartement lumineux, proche des commodités.',
                'prix' => 1200000,
                'surface' => 90,
                'nb_chambres' => 2,
                'nb_salle_bain' => 1,
                'adresse' => 'Bd Hassan II',
                'ville' => 'Casablanca',
                'parking' => true,
                'statut' => 'disponible',
                'valide' => true,
                'user_id' => $agent->id,
                'type_propriete_id' => $typeAppartement->id,
                'categorie_propriete_id' => $catVente->id,
            ]
        );

        Propriete::updateOrCreate(
            ['titre' => 'Appartement avec vue sur mer'],
            [
                'description' => 'Vue imprenable sur l’océan, résidence sécurisée.',
                'prix' => 1800000,
                'surface' => 110,
                'nb_chambres' => 3,
                'nb_salle_bain' => 2,
                'adresse' => 'Corniche Ain Diab',
                'ville' => 'Casablanca',
                'parking' => true,
                'statut' => 'disponible',
                'valide' => true,
                'user_id' => $agent->id,
                'type_propriete_id' => $typeAppartement->id,
                'categorie_propriete_id' => $catLuxe->id,
            ]
        );

        Propriete::updateOrCreate(
            ['titre' => 'Appartement économique'],
            [
                'description' => 'Idéal pour jeune couple ou investissement.',
                'prix' => 650000,
                'surface' => 65,
                'nb_chambres' => 1,
                'nb_salle_bain' => 1,
                'adresse' => 'Hay Mohammadi',
                'ville' => 'Casablanca',
                'parking' => false,
                'statut' => 'disponible',
                'valide' => true,
                'user_id' => $agent->id,
                'type_propriete_id' => $typeAppartement->id,
                'categorie_propriete_id' => $catVente->id,
            ]
        );

        // ======================
        // VILLAS
        // ======================

        Propriete::updateOrCreate(
            ['titre' => 'Villa avec piscine et jardin'],
            [
                'description' => 'Villa spacieuse, quartier calme.',
                'prix' => 4500000,
                'surface' => 320,
                'nb_chambres' => 5,
                'nb_salle_bain' => 3,
                'adresse' => 'Route de l’Ourika',
                'ville' => 'Marrakech',
                'parking' => true,
                'statut' => 'disponible',
                'valide' => false, // validation admin requise
                'user_id' => $agent->id,
                'type_propriete_id' => $typeVilla->id,
                'categorie_propriete_id' => $catLuxe->id,
            ]
        );

        Propriete::updateOrCreate(
            ['titre' => 'Villa familiale avec garage'],
            [
                'description' => 'Parfaite pour une grande famille.',
                'prix' => 2800000,
                'surface' => 250,
                'nb_chambres' => 4,
                'nb_salle_bain' => 2,
                'adresse' => 'Hay Riad',
                'ville' => 'Rabat',
                'parking' => true,
                'statut' => 'disponible',
                'valide' => true,
                'user_id' => $agent->id,
                'type_propriete_id' => $typeVilla->id,
                'categorie_propriete_id' => $catVente->id,
            ]
        );

        Propriete::updateOrCreate(
            ['titre' => 'Villa luxe avec vue panoramique'],
            [
                'description' => 'Prestations haut de gamme, quartier résidentiel.',
                'prix' => 7200000,
                'surface' => 450,
                'nb_chambres' => 6,
                'nb_salle_bain' => 4,
                'adresse' => 'Palmeraie',
                'ville' => 'Marrakech',
                'parking' => true,
                'statut' => 'disponible',
                'valide' => false, // admin doit valider
                'user_id' => $agent->id,
                'type_propriete_id' => $typeVilla->id,
                'categorie_propriete_id' => $catLuxe->id,
            ]
        );
    }
}
