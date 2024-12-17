@extends('layouts.app')

@section('content')
    <h1>Détails de l'avis</h1>

    <p><strong>Pharmacie:</strong> {{ $avis->pharmacie->nom }}</p>
    <p><strong>Utilisateur:</strong> {{ $avis->user->name }}</p>
    <p><strong>Commentaire:</strong> {{ $avis->commentaire }}</p>
    <p><strong>Note:</strong> {{ $avis->evaluation }}/5</p>
    <p><strong>Modéré:</strong> {{ $avis->modere ? 'Oui' : 'Non' }}</p>
@endsection