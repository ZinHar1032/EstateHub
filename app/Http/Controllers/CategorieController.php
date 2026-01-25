<?php

namespace App\Http\Controllers;

use App\Models\CategoriePropriete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    /**
     * Afficher la liste des catégories
     */
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        $categories = CategoriePropriete::withCount('proprietes')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return view('admin.categories.create');
    }

    /**
     * Enregistrer une nouvelle catégorie
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        $validated = $request->validate([
            'nom_categorie' => 'required|string|max:100|unique:categorie_proprietes',
            'actif' => 'required|boolean',
            'dispo' => 'required|boolean',
        ]);

        CategoriePropriete::create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie créée avec succès!');
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        $categorie = CategoriePropriete::withCount('proprietes')->findOrFail($id);

        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Mettre à jour une catégorie
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        $categorie = CategoriePropriete::findOrFail($id);

        $validated = $request->validate([
            'nom_categorie' => 'required|string|max:100|unique:categorie_proprietes,nom_categorie,'.$categorie->id,
            'actif' => 'required|boolean',
            'dispo' => 'required|boolean',
        ]);

        $categorie->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie mise à jour avec succès!');
    }

    /**
     * Supprimer une catégorie
     */
    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        $categorie = CategoriePropriete::findOrFail($id);

        // Vérifier si la catégorie est utilisée
        if ($categorie->proprietes()->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'Impossible de supprimer cette catégorie car elle est utilisée par des propriétés.');
        }

        $categorie->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie supprimée avec succès!');
    }
}
