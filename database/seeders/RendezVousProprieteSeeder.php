<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Propriete;
use App\Models\RendezVousPropriete;

class RendezVousProprieteSeeder extends Seeder
{
    public function run(): void
    {
        $client = User::where('role', 'client')->firstOrFail();
        $propriete = Propriete::where('valide', true)->firstOrFail();

        RendezVousPropriete::updateOrCreate(
            [
                'propriete_id' => $propriete->id,
                'date_visite' => Carbon::now()->addDays(2)->setTime(15, 0),
            ],
            [
                'user_id' => $client->id,
                'commentaire' => 'Je souhaite visiter ce bien, merci de confirmer.',
                'statut' => 'en_attente',
            ]
        );
    }
}
