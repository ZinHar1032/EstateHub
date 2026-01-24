<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriePropriete;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = CategoriePropriete::withCount('proprietes')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categorie_proprietes,nom_categorie',
            'actif' => 'nullable|boolean',
            'dispo' => 'nullable|boolean',
        ]);

        CategoriePropriete::create([
            'nom_categorie' => $validated['nom_categorie'],
            'actif' => $validated['actif'] ?? 1,
            'dispo' => $validated['dispo'] ?? 1,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie créée avec succès');
    }

    public function edit(CategoriePropriete $categorie)
    {
        return view('admin.categories.edit', compact('categorie'));
    }

    public function update(Request $request, CategoriePropriete $categorie)
    {
        $validated = $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categorie_proprietes,nom_categorie,' . $categorie->id,
            'actif' => 'nullable|boolean',
            'dispo' => 'nullable|boolean',
        ]);

        $categorie->update([
            'nom_categorie' => $validated['nom_categorie'],
            'actif' => $validated['actif'] ?? $categorie->actif,
            'dispo' => $validated['dispo'] ?? $categorie->dispo,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie modifiée avec succès');
    }

    public function destroy(CategoriePropriete $categorie)
    {
        if ($categorie->proprietes()->count() > 0) {
            return back()->with('error', 'Impossible de supprimer une catégorie liée à des propriétés');
        }
        $categorie->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée avec succès');
    }
}
