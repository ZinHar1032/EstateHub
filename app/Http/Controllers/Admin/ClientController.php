<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('role', 'client')->paginate(10);

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
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
            'role' => 'client',
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client créé avec succès');
    }

    public function edit(User $client)
    {
        if ($client->role !== 'client') {
            abort(404);
        }

        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, User $client)
    {
        if ($client->role !== 'client') {
            abort(404);
        }

        $validated = $request->validate([
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$client->id,
            'tel' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'password' => 'nullable|min:8',
        ]);

        $client->update([
            'nom_complet' => $validated['nom_complet'],
            'email' => $validated['email'],
            'tel' => $validated['tel'] ?? null,
            'ville' => $validated['ville'] ?? null,
        ]);

        if ($request->filled('password')) {
            $client->update(['password' => bcrypt($validated['password'])]);
        }

        return redirect()->route('admin.clients.index')->with('success', 'Client modifié avec succès');
    }

    public function destroy(User $client)
    {
        if ($client->role !== 'client') {
            abort(404);
        }
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client supprimé avec succès');
    }
}
