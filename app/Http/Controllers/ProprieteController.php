<?php

namespace App\Http\Controllers;

use App\Models\Propriete;
use App\Models\TypePropriete;
use App\Models\CategoriePropriete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProprieteController extends Controller
{
    public function index()
    {
        // Agent : voit seulement ses biens
        if (Auth::check() && Auth::user()->role === 'agent') {
            $proprietes = Propriete::where('user_id', Auth::id())
                ->with(['typePropriete', 'categoriePropriete', 'images', 'imagePrincipale', 'user'])
                ->get();
        }
        // Admin : voit tout
        elseif (Auth::check() && Auth::user()->role === 'admin') {
            $proprietes = Propriete::with(['typePropriete', 'categoriePropriete', 'images', 'imagePrincipale', 'user'])
                ->get();
        }
        // Visiteur + client : voit seulement validé
        else {
            $proprietes = Propriete::where('valide', true)
                ->with(['typePropriete', 'categoriePropriete', 'images', 'imagePrincipale', 'user'])
                ->get();
        }

        return view('biens.proprietes', compact('proprietes'));
    }

    public function home()
    {
        $proprietes = Propriete::where('valide', true)
            ->with(['typePropriete', 'categoriePropriete', 'images', 'user'])
            ->get();

        return view('home', compact('proprietes'));
    }

    public function create()
    {
        $types = TypePropriete::orderBy('nom_type')->get();
        $categories = CategoriePropriete::orderBy('nom_categorie')->get();

        return view('biens.ajout_propriete', compact('types', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'surface' => 'required|integer',
            'nb_chambres' => 'nullable|integer',
            'nb_salle_bain' => 'nullable|integer',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'parking' => 'required|in:0,1',
            'statut' => 'required|in:disponible,vendu,reserve',
            'type_propriete_id' => 'required|exists:type_proprietes,id',
            'categorie_propriete_id' => 'required|exists:categorie_proprietes,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['user_id'] = Auth::id();
        $data['parking'] = (int) $data['parking'];

        $propriete = Propriete::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('proprietes', 'public');
                $propriete->images()->create([
                    'chemin_image' => $path,
                ]);
            }
        }

        return redirect()->route('biens')->with('success', 'Bien ajouté avec succès !');
    }

    // ✅ Détails (pour agent + pour visiteurs si tu veux)
    public function show(Propriete $propriete)
    {
        $propriete->load(['typePropriete', 'categoriePropriete', 'images', 'imagePrincipale', 'user']);
        return view('biens.show', compact('propriete'));
    }

    public function edit(Propriete $propriete)
    {
        $types = TypePropriete::orderBy('nom_type')->get();
        $categories = CategoriePropriete::orderBy('nom_categorie')->get();

        $propriete->load('images');

        return view('biens.modifier_propriete', compact('propriete', 'types', 'categories'));
    }

    public function update(Request $request, Propriete $propriete)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'surface' => 'required|integer',
            'nb_chambres' => 'nullable|integer',
            'nb_salle_bain' => 'nullable|integer',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'parking' => 'required|in:0,1',
            'statut' => 'required|in:disponible,vendu,reserve',
            'type_propriete_id' => 'required|exists:type_proprietes,id',
            'categorie_propriete_id' => 'required|exists:categorie_proprietes,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['parking'] = (int) $data['parking'];

        $propriete->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('proprietes', 'public');
                $propriete->images()->create([
                    'chemin_image' => $path,
                ]);
            }
        }

        return redirect()->route('biens')->with('success', 'Bien modifié avec succès !');
    }

    // ✅ Admin : valider / invalider une propriété
    public function toggleValidation(Propriete $propriete)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        $propriete->valide = !$propriete->valide;
        $propriete->save();

        return redirect()->back()->with('success', 'Statut de validation mis à jour.');
    }
}
