@extends('layouts.app')

@section('content')
    <h1>Ajouter un avis</h1>

    <form action="{{ route('avis.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_pharmacie">Pharmacie</label>
            <input type="number" name="id_pharmacie" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="id_utilisateur">Utilisateur</label>
            <input type="number" name="id_utilisateur" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="commentaire">Commentaire</label>
            <textarea name="commentaire" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="evaluation">Note</label>
            <input type="number" name="evaluation" class="form-control" min="1" max="5" required>
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@endsection
