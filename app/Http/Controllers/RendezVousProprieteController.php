<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\RendezVousPropriete;
use App\Models\Propriete;
use Illuminate\Http\Request;

class RendezVousProprieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $agent = auth::user();

    // RDV liés à l’agent connecté
     $prt = Propriete::where('user_id', $agent->id)->pluck('id');
    $rdvs = RendezVousPropriete::whereIn('propriete_id', $prt)
                ->with('propriete') // si relation existe
                ->orderBy('date_visite', 'asc')
                ->paginate(10);

    return view('rendez-vous.index', compact('rdvs'));
}

    /**
     * Show the form for creating a new resource.
     */
         
// ✅ Formulaire réserver RDV (visiteur/client)
 public function create(Propriete $propriete)
{
    // 1) Visiteur => redirection login (plus d'erreur 500)
    if (!Auth::check()) {
        return redirect()->route('login')
            ->with('error', 'Veuillez vous connecter pour planifier une visite.');
    }

    // 2) Empêcher RDV sur bien non validé
    if (!$propriete->valide) {
        abort(404);
    }

    return view('rendez-vous.create', compact('propriete'));
}

    // ✅ Sauvegarder RDV (visiteur/client)
   public function store(Request $request, Propriete $propriete)
{
    if (!Auth::check()) {
        return redirect()->route('login')
            ->with('error', 'Veuillez vous connecter pour planifier une visite.');
    }

    if (!$propriete->valide) {
        abort(404);
    }

    $request->validate([
        'date'  => 'required|date',
        'heure' => 'required',
    ]);

    RendezVousPropriete::create([
        'propriete_id' => $propriete->id,
        'user_id'      => Auth::id(), // ✅ le client/visiteur connecté
        'date_visite'  => $request->date . ' ' . $request->heure . ':00',
        'statut'       => 'en_attente',
    ]);

    return redirect()->route('biens')->with('success', 'Rendez-vous réservé avec succès.');
}
    /**
     * Display the specified resource.
     */
    public function show(RendezVousPropriete $rendezVousPropriete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RendezVousPropriete $rendezVousPropriete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RendezVousPropriete $rendezVousPropriete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RendezVousPropriete $rendezVousPropriete)
    {
        //
    }


    public function confirm(Request $request)
    {
        $rdv = RendezVousPropriete::findOrFail($request->rdv_id);
        
        $rdv->statut = 'confirme';
        $rdv->save();

        return redirect()->route('biens')->with('success', 'Rendez-vous confirmé avec succès.');
    }

      public function cancel(Request $request)
    {
        $rdv = RendezVousPropriete::findOrFail($request->rdv_id);
     
        $rdv->statut = 'annule';
        $rdv->save();

        return redirect()->route('biens')->with('success', 'Rendez-vous annulé avec succès.');
    }

}
