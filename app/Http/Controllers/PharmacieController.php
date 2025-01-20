<?php

namespace App\Http\Controllers;

use App\Models\Pharmacie; // Importer le modèle Pharmacie
use Illuminate\Http\Request;

class PharmacieController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacie::all();
        return view('pharmacies.index', compact('pharmacies'));
        
    }
 
    public function ph_index()
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();
    
        if (!$user) {
            return redirect()->route('login')->withErrors('Vous devez être connecté pour accéder à cette page.');
        }
    
        // Récupérer les pharmacies associées à cet utilisateur
        $pharmacie_ph = Pharmacie::where('id_pharmacien', $user->id_utilisateur)->get();
    
        // Retourner la vue avec les données
        return view('pharmacien.dashboard', compact('pharmacie_ph'));
    }

    
    public function create()
    {
        return view('pharmacies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pharmacyName' => 'required|string',
            'address' => 'required|string',
            'telephone' => 'required|string',
            'openingHours' => 'required|string',
            'servicesOffered' => 'required|string',
            'paymentMethods' => 'required|string',
            'isOnCall' => 'required|in:yes,no', // Ensure isOnCall is either "yes" or "no"
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'pharmacistId' => 'required|integer', 
        ]);

        $pharmacy = new Pharmacie;
        $pharmacy->nom = $validatedData['pharmacyName'];
        $pharmacy->adresse = $validatedData['address'];
        $pharmacy->telephone = $validatedData['telephone'];
        $pharmacy->horaires_ouverture = $validatedData['openingHours']; 
        $pharmacy->services_offerts = $validatedData['servicesOffered'];
        $pharmacy->moyens_paiement = $validatedData['paymentMethods'];
        $pharmacy->est_de_garde = $validatedData['isOnCall']; 
        $pharmacy->latitude = $validatedData['latitude'];
        $pharmacy->longitude = $validatedData['longitude'];
        $pharmacy->id_pharmacien = $validatedData['pharmacistId']; 
        $pharmacy->save();

        return redirect()->route('pharmacies.index')->with('success', 'Pharmacie créée avec succès !'); 
    }

    public function show($id_pharmacie)
    {
        $pharmacie = Pharmacie::findOrFail($id_pharmacie); // Utilise id_pharmacie comme clé primaire
        return view('pharmacies.show', compact('pharmacie'));
    }
    

    public function edit(Pharmacie $pharmacie)
    {
        return view('pharmacies.edit', compact('pharmacie'));
    }

    public function update(Request $request, Pharmacie $pharmacie)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'adresse' => 'required',
            'telephone' => 'nullable|max:15',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $pharmacie->update($request->all());

        return redirect()->route('pharmacies.index')->with('success', 'Pharmacie mise à jour avec succès');
    }
    public function pharmacieSearch(Request $request)
    {
        // Validation des paramètres de recherche
        $request->validate([
            'query' => 'nullable|string|max:255', // La requête de recherche
            'location' => 'nullable|string|max:255', // Optionnel : recherche par localisation
        ]);
    
        // Récupérer les critères de recherche
        $query = $request->input('query');
        $location = $request->input('location');
    
        // Construire la requête
        $pharmacies = Pharmacie::query();
    
        if ($query) {
            // Recherche par nom ou autre champ pertinent
            $pharmacies->where('nom', 'like', '%' . $query . '%');
        }
    
        if ($location) {
            // Recherche par localisation
            $pharmacies->where('localisation', 'like', '%' . $location . '%');
        }
    
        // Exécuter la requête et obtenir les résultats
        $pharmacies = $pharmacies->get();
    
        // Retourner la vue avec les résultats
        return view('pharmacies.index', compact('pharmacies'));
    }
    
    public function destroy($id_pharmacie)
    {
        $pharmacie = Pharmacie::findOrFail($id_pharmacie);
        $pharmacie->delete();
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacie supprimée avec succès');
    }
    
}
