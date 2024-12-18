@extends('layouts.app')

@section('content')

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Utilisateurs</li>
                    </ol>
                </nav>
            </div>
        </nav>
        <div class="container-fluid py-2">
            <div class="row">
                <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">Utilisateurs</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 mt-4 mb-4">
                <a class="btn btn-sm btn-outline-success" href="{{ route('users.create') }}" >+ Ajouter un Utilisateur</a>

                <div class="card">
                <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                              
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>
                                                    <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-primary">Voir</a>
                                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Modifier</a>

                                                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
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
@endsection