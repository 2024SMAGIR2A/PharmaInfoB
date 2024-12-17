@extends('layouts.app')

@section('content')
    <h1>Liste des avis</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Pharmacie</th>
                <th>Utilisateur</th>
                <th>Commentaire</th>
                <th>Note</th>
                <th>Modéré</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($avis as $avis)
                <tr>
                    <td>{{ $avis->pharmacie ? $avis->pharmacie->nom : 'Pharmacie inconnue' }}</td>
                    <td>{{ $avis->user ? $avis->user->name : 'Utilisateur inconnu' }}</td>
                    <td>{{ $avis->commentaire }}</td>
                    <td>{{ $avis->evaluation }}/5</td>
                    <td>{{ $avis->modere ? 'Oui' : 'Non' }}</td>
                    <td>
                        <a href="{{ route('avis.show', $avis) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('avis.edit', $avis) }}" class="btn btn-secondary">Modifier</a>
                        <form action="{{ route('avis.destroy', $avis) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
