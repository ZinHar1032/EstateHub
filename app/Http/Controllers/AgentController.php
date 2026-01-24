<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    
public function index()
{
    // Filtrer les utilisateurs avec le rôle "agent"
    $agents = User::where('role', 'agent') // ou le rôle que vous utilisez pour les agents
                  ->withCount('proprietes') // Si vous avez une relation proprietes
                  ->paginate(10);
    
    return view('admin.agents.index', compact('agents'));
}
public function create()
    {
        return view('admin.agents.create');
    }
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'tel' => 'nullable|string|max:20',
            'ville' => 'nullable|string|max:100',
            'password' => 'required|min:8|confirmed',
        ]);
        
        // Création de l'agent
        $user = User::create([
            'nom_complet' => $validated['nom_complet'],
            'email' => $validated['email'],
            'tel' => $validated['tel'],
            'ville' => $validated['ville'],
            'role' => 'agent',
            'password' => Hash::make($validated['password']),
        ]);
        
        // Redirection avec message de succès
        return redirect()->route('agents.index')
            ->with('success', 'Agent créé avec succès!');
    }
    
public function edit($id)
{
    // Vérifier si l'utilisateur est admin

    
    $agent = User::findOrFail($id);
    
    return view('admin.agents.edit', compact('agent'));
}

/**
 * Mettre à jour un agent
 */
public function update(Request $request, $id)
{
    // Vérifier si l'utilisateur est admin
   
    
    $agent = User::findOrFail($id);
    
    // Validation des données
    $validated = $request->validate([
        'nom_complet' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $agent->id,
        'tel' => 'nullable|string|max:20',
        'ville' => 'nullable|string|max:100',
        'password' => 'nullable|min:8|confirmed',
    ]);
    
    // Préparation des données à mettre à jour
    $updateData = [
        'nom_complet' => $validated['nom_complet'],
        'email' => $validated['email'],
        'tel' => $validated['tel'],
        'ville' => $validated['ville'],
    ];
    
    // Mettre à jour le mot de passe si fourni
    if (!empty($validated['password'])) {
        $updateData['password'] = Hash::make($validated['password']);
    }
    
    // Mise à jour de l'agent
    $agent->update($updateData);
    
    return redirect()->route('agents.index')
        ->with('success', 'Agent mis à jour avec succès!');
}
}
