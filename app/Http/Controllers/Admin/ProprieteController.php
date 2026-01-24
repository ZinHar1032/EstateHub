<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Propriete;
use App\Models\CategoriePropriete;
use App\Models\TypePropriete;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProprieteController extends Controller
{
    public function index()
    {
        $proprietes = Propriete::with(['user', 'categoriePropriete', 'typePropriete'])->paginate(10);
        return view('admin.proprietes.index', compact('proprietes'));
    }

    public function create()
    {
        $agents = User::where('role', 'agent')->get();
        $categories = CategoriePropriete::all();
        $typeProprietes = TypePropriete::all();
        return view('admin.proprietes.create', compact('agents', 'categories', 'typeProprietes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'surface' => 'required|integer|min:1',
            'nb_chambres' => 'nullable|integer|min:0',
            'nb_salle_bain' => 'nullable|integer|min:0',
            'parking' => 'nullable|boolean',
            'statut' => 'required|in:disponible,reserve,vendu',
            'user_id' => 'required|exists:users,id',
            'categorie_propriete_id' => 'required|exists:categorie_proprietes,id',
            'type_propriete_id' => 'required|exists:type_proprietes,id',
            'images' => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $propriete = Propriete::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('proprietes', 'public');
                $propriete->images()->create([
                    'chemin_image' => $path,
                    'ordre' => $index,
                    'principale' => $index === 0 ? 1 : 0,
                ]);
            }
        }

        return redirect()->route('admin.proprietes.index')->with('success', 'Propriété créée avec succès');
    }

    public function edit(Propriete $propriete)
    {
        $agents = User::where('role', 'agent')->get();
        $categories = CategoriePropriete::all();
        $typeProprietes = TypePropriete::all();
        $propriete->load('images');
        return view('admin.proprietes.edit', compact('propriete', 'agents', 'categories', 'typeProprietes'));
    }

    public function update(Request $request, Propriete $propriete)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'surface' => 'required|integer|min:1',
            'nb_chambres' => 'nullable|integer|min:0',
            'nb_salle_bain' => 'nullable|integer|min:0',
            'parking' => 'nullable|boolean',
            'statut' => 'required|in:disponible,reserve,vendu',
            'user_id' => 'required|exists:users,id',
            'categorie_propriete_id' => 'required|exists:categorie_proprietes,id',
            'type_propriete_id' => 'required|exists:type_proprietes,id',
            'images' => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $propriete->update($validated);

        if ($request->hasFile('images')) {
            $existingCount = $propriete->images()->count();
            $maxNew = 5 - $existingCount;
            
            if ($maxNew > 0) {
                foreach (array_slice($request->file('images'), 0, $maxNew) as $index => $image) {
                    $path = $image->store('proprietes', 'public');
                    $propriete->images()->create([
                        'chemin_image' => $path,
                        'ordre' => $existingCount + $index,
                        'principale' => 0,
                    ]);
                }
            }
        }

        return redirect()->route('admin.proprietes.index')->with('success', 'Propriété modifiée avec succès');
    }

    public function destroy(Propriete $propriete)
    {
        foreach ($propriete->images as $image) {
            Storage::disk('public')->delete($image->chemin_image);
        }
        $propriete->delete();
        return redirect()->route('admin.proprietes.index')->with('success', 'Propriété supprimée avec succès');
    }

    public function toggleValidation(Propriete $propriete)
    {
        $propriete->update(['valide' => !$propriete->valide]);
        return back()->with('success', 'Validation modifiée avec succès');
    }
}
