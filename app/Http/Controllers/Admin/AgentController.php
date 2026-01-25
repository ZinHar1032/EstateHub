<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = User::where('role', 'agent')
            ->withCount('proprietes')
            ->paginate(10);

        return view('admin.agents.index', compact('agents'));
    }

    public function create()
    {
        return view('admin.agents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'tel' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'password' => 'required|min:8',
        ]);

        User::create([
            'nom_complet' => $validated['nom_complet'],
            'email' => $validated['email'],
            'tel' => $validated['tel'] ?? null,
            'ville' => $validated['ville'] ?? null,
            'password' => bcrypt($validated['password']),
            'role' => 'agent',
        ]);

        return redirect()->route('admin.agents.index')->with('success', 'Agent créé avec succès');
    }

    public function edit(User $agent)
    {
        if ($agent->role !== 'agent') {
            abort(404);
        }

        return view('admin.agents.edit', compact('agent'));
    }

    public function update(Request $request, User $agent)
    {
        if ($agent->role !== 'agent') {
            abort(404);
        }

        $validated = $request->validate([
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$agent->id,
            'tel' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'password' => 'nullable|min:8',
        ]);

        $agent->update([
            'nom_complet' => $validated['nom_complet'],
            'email' => $validated['email'],
            'tel' => $validated['tel'] ?? null,
            'ville' => $validated['ville'] ?? null,
        ]);

        if ($request->filled('password')) {
            $agent->update(['password' => bcrypt($validated['password'])]);
        }

        return redirect()->route('admin.agents.index')->with('success', 'Agent modifié avec succès');
    }

    public function destroy(User $agent)
    {
        if ($agent->role !== 'agent') {
            abort(404);
        }
        $agent->delete();

        return redirect()->route('admin.agents.index')->with('success', 'Agent supprimé avec succès');
    }
}
