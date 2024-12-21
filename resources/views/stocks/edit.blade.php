@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Stock</h1>
    <form action="{{ route('stocks.update', $stock) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_pharmacie">Pharmacie</label>
            <select name="id_pharmacie" id="id_pharmacie" class="form-control" required>
                <option value="" disabled>Choisir une pharmacie</option>
                @foreach($pharmacies as $pharmacie)
                    <option value="{{ $pharmacie->id }}" {{ $pharmacie->id == $stock->id_pharmacie ? 'selected' : '' }}>
                        {{ $pharmacie->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_medicament">Médicament</label>
            <select name="id_medicament" id="id_medicament" class="form-control" required>
                <option value="" disabled>Choisir un médicament</option>
                @foreach($medicaments as $medicament)
                    <option value="{{ $medicament->id }}" {{ $medicament->id == $stock->id_medicament ? 'selected' : '' }}>
                        {{ $medicament->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantite">Quantité</label>
            <input type="number" name="quantite" id="quantite" class="form-control" value="{{ $stock->quantite }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('stocks.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
