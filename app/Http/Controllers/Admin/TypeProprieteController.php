<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypePropriete;
use Illuminate\Http\Request;

class TypeProprieteController extends Controller
{
    public function index()
    {
        $typeProprietes = TypePropriete::withCount('proprietes')->paginate(10);

        return view('admin.type-proprietes.index', compact('typeProprietes'));
    }

    public function create()
    {
        return view('admin.type-proprietes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_type' => 'required|string|max:255|unique:type_proprietes,nom_type',
            'description' => 'nullable|string',
            'actif' => 'nullable|boolean',
        ]);

        TypePropriete::create([
            'nom_type' => $validated['nom_type'],
            'description' => $validated['description'] ?? null,
            'actif' => $validated['actif'] ?? 1,
        ]);

        return redirect()->route('admin.type-proprietes.index')->with('success', 'Type de propriété créé avec succès');
    }

    public function edit(TypePropriete $typePropriete)
    {
        return view('admin.type-proprietes.edit', compact('typePropriete'));
    }

    public function update(Request $request, TypePropriete $typePropriete)
    {
        $validated = $request->validate([
            'nom_type' => 'required|string|max:255|unique:type_proprietes,nom_type,'.$typePropriete->id,
            'description' => 'nullable|string',
            'actif' => 'nullable|boolean',
        ]);

        $typePropriete->update([
            'nom_type' => $validated['nom_type'],
            'description' => $validated['description'] ?? null,
            'actif' => $validated['actif'] ?? $typePropriete->actif,
        ]);

        return redirect()->route('admin.type-proprietes.index')->with('success', 'Type de propriété modifié avec succès');
    }

    public function destroy(TypePropriete $typePropriete)
    {
        $typePropriete->delete();

        return redirect()->route('admin.type-proprietes.index')->with('success', 'Type de propriété supprimé avec succès');
    }
}
