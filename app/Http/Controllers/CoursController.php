<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Etudiant;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours = Cours::all();
        return view('cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'professeur' => 'required|string|max:255',
            'volume_horaire' => 'required|integer|min:1',
        ]);
        Cours::create($validated);
        return redirect()->route('cours.index')
            ->with('success', 'Cours créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cours = Cours::with('etudiants')->findOrFail($id);
        return view('cours.show', compact('cours'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cours = Cours::with('etudiants')->findOrFail($id);
        $etudiants = Etudiant::all();
        return view('cours.edit', compact('cours', 'etudiants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'professeur' => 'required|string|max:255',
            'volume_horaire' => 'required|integer|min:1',
        ]);
        $cours = Cours::findOrFail($id);
        $cours->update($validated);
        // Many-to-Many: synchroniser les étudiants sélectionnés
        $cours->etudiants()->sync($request->input('etudiants', []));
        return redirect()->route('cours.index')
            ->with('success', 'Cours modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();

        return redirect()->route('cours.index')
            ->with('success', 'Cours supprimé avec succès.');
    }
}
