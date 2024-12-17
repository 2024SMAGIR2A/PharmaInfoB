<form action="{{ route('pharmacies.update', $pharmacie->id_pharmacie) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $pharmacie->nom) }}" required>
    </div>
    <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse', $pharmacie->adresse) }}" required>
    </div>
    <!-- Ajoutez d'autres champs ici si nécessaire -->

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
