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
        'nom' => 'required|string',              // Nom de la pharmacie
        'adresse' => 'required|string',          // Adresse
        'telephone' => 'required|string',        // Téléphone
        'horaires_ouverture' => 'required|string', // Horaires d'ouverture
        'services_offerts' => 'required|string',  // Services proposés
        'moyens_paiement' => 'required|string',   // Moyens de paiement
        'est_de_garde' => 'required|in:1,0',      // De garde (1 pour Oui, 0 pour Non)
        'latitude' => 'required|numeric',         // Latitude
        'longitude' => 'required|numeric',        // Longitude
        'id_pharmacien' => 'required|integer',    // ID du pharmacien
    ]);
    

    $pharmacy = new Pharmacie;
    $pharmacy->nom = $validatedData['nom']; // Nom de la pharmacie
    $pharmacy->adresse = $validatedData['adresse']; // Adresse
    $pharmacy->telephone = $validatedData['telephone']; // Téléphone
    $pharmacy->horaires_ouverture = $validatedData['horaires_ouverture']; // Horaires d'ouverture
    $pharmacy->services_offerts = $validatedData['services_offerts']; // Services proposés
    $pharmacy->moyens_paiement = $validatedData['moyens_paiement']; // Moyens de paiement
    $pharmacy->est_de_garde = $validatedData['est_de_garde']; // De garde (1 ou 0)
    $pharmacy->latitude = $validatedData['latitude']; // Latitude
    $pharmacy->longitude = $validatedData['longitude']; // Longitude
    $pharmacy->id_pharmacien = $validatedData['id_pharmacien']; // ID du pharmacien
    $pharmacy->save();


    return redirect()->route('pharmacies.index')->with('success', 'Pharmacie créée avec succès !'); 
}

    public function show($id_pharmacie)
    {
        $pharmacie = Pharmacie::findOrFail($id_pharmacie); // Utilise id_pharmacie comme clé primaire
        return view('pharmacies.show', compact('pharmacie'));
    }
    

    public function edit($id_pharmacie)
{
    $pharmacie = Pharmacie::findOrFail($id_pharmacie); // Utilisation de l'ID pour récupérer la pharmacie
    return view('pharmacies.edit', compact('pharmacie'));
}


public function update($id_pharmacie)
{
    // Récupérer la pharmacie par ID
    $pharmacie = Pharmacie::findOrFail($id_pharmacie);

    // Valider les données envoyées par le formulaire
    $validatedData = request()->validate([
        'nom' => 'required|max:255',
        'adresse' => 'required',
        'telephone' => 'nullable|max:15',
        'horaires_ouverture' => 'nullable|max:255',
        'services_offerts' => 'nullable|max:255',
        'moyens_paiement' => 'nullable|max:255',
        'est_de_garde' => 'required|boolean',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'id_pharmacien' => 'nullable|numeric',
    ]);

    

    // Mettre à jour la pharmacie avec les données validées
    $pharmacie->update($validatedData);

    // Rediriger avec un message de succès
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
        return view('pharmacies.index_search', compact('pharmacies'));
    }
    
    public function destroy($id_pharmacie)
    {
        $pharmacie = Pharmacie::findOrFail($id_pharmacie);
        $pharmacie->delete();
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacie supprimée avec succès');
    }
    
}
