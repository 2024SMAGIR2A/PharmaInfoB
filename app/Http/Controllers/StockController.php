<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Pharmacie;
use App\Models\Medicament;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with(['pharmacie', 'medicament'])->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $pharmacies = Pharmacie::all();
        $medicaments = Medicament::all();
        return view('stocks.create', compact('pharmacies', 'medicaments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pharmacie' => 'required|exists:pharmacies,id',
            'id_medicament' => 'required|exists:medicaments,id',
            'quantite' => 'required|integer|min:0',
        ]);

        Stock::create($request->all());
        return redirect()->route('stocks.index')->with('success', 'Stock ajouté avec succès.');
    }

    public function edit(Stock $stock)
    {
        $pharmacies = Pharmacie::all();
        $medicaments = Medicament::all();
        return view('stocks.edit', compact('stock', 'pharmacies', 'medicaments'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'id_pharmacie' => 'required|exists:pharmacies,id',
            'id_medicament' => 'required|exists:medicaments,id',
            'quantite' => 'required|integer|min:0',
        ]);

        $stock->update($request->all());
        return redirect()->route('stocks.index')->with('success', 'Stock mis à jour avec succès.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock supprimé avec succès.');
    }
}
