<?php

namespace App\Http\Controllers;

use App\Models\TypePropriete;
use Illuminate\Http\Request;

class TypeProprieteController extends Controller
{
    public function index()
    {
        return TypePropriete::orderBy('nom_type')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_type' => 'required|string|max:255|unique:type_proprietes,nom_type',
            'description' => 'nullable|string',
            'actif' => 'boolean',
        ]);

        return TypePropriete::create($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TypePropriete $typePropriete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypePropriete $typePropriete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypePropriete $typePropriete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypePropriete $typePropriete)
    {
        //
    }
}
