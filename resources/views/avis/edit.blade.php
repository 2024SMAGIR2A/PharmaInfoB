@extends('layouts.app')

@section('content')
    <h1>Modifier l'avis</h1>

    <form method="POST" action="{{ route('avis.update', $avis) }}">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection