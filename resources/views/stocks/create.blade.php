@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Stock</h1>
    <form action="{{ route('stocks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_pharmacie" class="form-label">Pharmacie</label>
            <select name="id_pharmacie" id="id_pharmacie" class="form-control" required>
                <option value="" disabled selected>Choisir une pharmacie</option>
                @foreach($pharmacies as $pharmacie)
                    <option value="{{ $pharmacie->id }}">{{ $pharmacie->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_medicament" class="form-label">Médicament</label>
            <select name="id_medicament" id="id_medicament" class="form-control" required>
                <option value="" disabled selected>Choisir un médicament</option>
                @foreach($medicaments as $medicament)
                    <option value="{{ $medicament->id_medicament }}">{{ $medicament->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" name="quantite" id="quantite" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('stock.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
