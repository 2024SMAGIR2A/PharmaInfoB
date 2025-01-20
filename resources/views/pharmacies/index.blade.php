@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Pharmacie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid py-2">
    <h1></h1>
   

    </div>

    <div class="container-fluid py-2">
            <div class="row">
                <div class="ms-3">
                <h2 class="mb-0 h4 font-weight-bolder">Liste des Pharmacies</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 mt-4 mb-4">
                <a class="btn btn-sm btn-outline-success" href="{{ route('pharmacies.create') }}"> + Ajouter une Pharmacie</a>
                    <div class="card">
                        <div class="card-body">                             
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Localisation</th>
                                        <th>telephone</th>
                                        <th>horaire</th>
                                        <th>disponibilite</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($pharmacies as $pharmacie)
                                    <tr>
                                        <td>{{ $pharmacie->nom }}</td>
                                        <td>{{ $pharmacie->adresse }}</td>
                                        <td>{{ $pharmacie->telephone}}</td>
                                        <td>{{ $pharmacie->horaires_ouverture }}</td>
                                        <td><span class="badge bg-success">{{ $pharmacie->est_de_garde }}</span></td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('pharmacies.show', $pharmacie->id_pharmacie) }}">Voir</a>
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('pharmacies.edit', $pharmacie->id_pharmacie) }}">Modifier</a>
                                        <form action="{{ route('pharmacies.destroy', $pharmacie->id_pharmacie) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit">Supprimer</button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    </tbody>
                            </table>       
                        </div>
                    </div>
                </div>    
            </div>
        </div>
</body>
</html>
@endsection
