<?php

namespace App\Http\Controllers;

use App\Models\CategoriePropriete;
use Illuminate\Http\Request;

class CategorieProprieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoriePropriete::orderBy('nom_categorie')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categorie_proprietes,nom_categorie',
            'actif' => 'boolean',
            'dispo' => 'boolean',
        ]);

        return CategoriePropriete::create($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   

    /**
     * Display the specified resource.
     */
    public function show(CategoriePropriete $categoriePropriete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriePropriete $categoriePropriete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriePropriete $categoriePropriete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriePropriete $categoriePropriete)
    {
        //
    }
}
