<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\TypePropriete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Afficher la liste des types
     */
    public function index()
    {
        // Vérifier si l'utilisateur est admin
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }
        
        $types = TypePropriete::orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.types.index', compact('types'));
    }
    
    /**
     * Afficher le formulaire de création d'un type
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }
        
        return view('admin.types.create');
    }
    
    /**
     * Enregistrer un nouveau type
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }
        
        $validated = $request->validate([
            'nom_type' => 'required|string|max:100|unique:type_proprietes',
            'description' => 'nullable|string|max:500',
            'actif' => 'required|boolean',
        ]);
        
        TypePropriete::create($validated);
        
        return redirect()->route('types.index')
            ->with('success', 'Type créé avec succès!');
    }
    
    /**
     * Afficher le formulaire d'édition d'un type
     */
    public function edit(TypePropriete  $type)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }
        
        return view('admin.types.edit', compact('type'));
    }
    
    /**
     * Mettre à jour un type
     */
    public function update(Request $request, TypePropriete $type)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }
        
        $validated = $request->validate([
            'nom_type' => 'required|string|max:100|unique:type_proprietes,nom_type,' . $type->id,
            'description' => 'nullable|string|max:500',
            'actif' => 'required|boolean',
        ]);
        
        $type->update($validated);
        
        return redirect()->route('types.index')
            ->with('success', 'Type mis à jour avec succès!');
    }
    
    /**
     * Supprimer un type
     */
    public function destroy(TypePropriete $type)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }
        
        $type->delete();
        
        return redirect()->route('types.index')
            ->with('success', 'Type supprimé avec succès!');
    }
}