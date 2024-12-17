<?php

namespace App\Http\Controllers;
use App\Models\Avis; // Importer le modèle Avis
use Illuminate\Http\Request;

class AvisController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_pharmacie' => 'required|integer',
            'id_utilisateur' => 'required|integer',
            'commentaire' => 'required|string',
            'evaluation' => 'required|integer|between:1,5', 
        ]);

        $avis = new Avis();
        $avis->id_pharmacie = $request->id_pharmacie;
        $avis->id_utilisateur = $request->id_utilisateur;
        $avis->commentaire = $request->commentaire;
        $avis->evaluation = $request->evaluation;
        $avis->save();

        // Optionally, redirect to a success page or return a JSON response
        return redirect()->route('avis.index')->with('success', 'Avis created successfully.');
    }

    public function index()
    {
        $avis = Avis::all(); // Fetch all avis
        return view('avis.index', compact('avis')); 
    }

    public function create()
{
    // Optionally, you can pass any data to the view here (e.g., empty Avis object)
    return view('avis.create');
}
    public function show(Avis $avis)
    {
        return view('avis.show', compact('avis')); 
    }


    public function update(Request $request, Avis $avis)
    {
        $request->validate([
            'commentaire' => 'required|string',
            'evaluation' => 'required|integer|between:1,5', 
        ]);

        $avis->commentaire = $request->commentaire;
        $avis->evaluation = $request->evaluation;
        $avis->save();

        return redirect()->route('avis.index')->with('success', 'Avis updated successfully.');
    }


    public function destroy(Avis $avis)
    {
        $avis->delete();
        return redirect()->route('avis.index')->with('success', 'Avis deleted successfully.');
    }
}
