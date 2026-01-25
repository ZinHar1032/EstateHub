<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RendezVousPropriete;

class RendezVousController extends Controller
{
    public function index()
    {
        $rendezVous = RendezVousPropriete::with(['user', 'propriete'])->paginate(10);

        return view('admin.rendez-vous.index', compact('rendezVous'));
    }

    public function confirm(RendezVousPropriete $rendezVous)
    {
        $rendezVous->update(['statut' => 'confirme']);

        return back()->with('success', 'Rendez-vous confirmé avec succès');
    }

    public function cancel(RendezVousPropriete $rendezVous)
    {
        $rendezVous->update(['statut' => 'annule']);

        return back()->with('success', 'Rendez-vous annulé avec succès');
    }
}
