@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestion des Stocks</h1>
    <a href="{{ route('stocks.create') }}" class="btn btn-primary mb-3">Ajouter un stock</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Pharmacie</th>
                <th>Médicament</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{ $stock->id }}</td>
                    <td>{{ $stock->pharmacie->nom ?? 'N/A' }}</td>
                    <td>{{ $stock->medicament->nom ?? 'N/A' }}</td>
                    <td>{{ $stock->quantite }}</td>
                    <td>
                        <a href="{{ route('stocks.edit', $stock) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('stocks.destroy', $stock) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce stock ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
