<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Pharmacie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MedicamentsController extends Controller
{
    //
    public function index()
    {
        $medicaments = Medicament::all();
        return view('medicaments.index', compact('medicaments'));
        
    }

    public function create()
    {
        return view('medicaments.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'medicamentName' => 'required|string'
        ]);

        $medoc = new Medicament;
        $medoc->nom = $validatedData['medicamentName'];
        $medoc->save();

        return redirect()->route('medicaments.index')->with('success', 'Medicament crée avec succès !'); 
    }

    public function addStock(string $id_medicament){                    
        $medicament = Medicament::findOrFail($id_medicament);
        // dd($medicament);
                    

        $pharmacies = Pharmacie::all();

        // dd($medoc);
        //dd($pharmacies);
        return view('medicaments.show',['medicament'=>$medicament,'pharmacies'=>$pharmacies]);
    }
}
