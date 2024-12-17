<h1>Modifier la Pharmacie</h1>
<form action="{{ route('pharmacies.update', $pharmacie->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" value="{{ $pharmacie->nom }}" required>

    <label for="adresse">Adresse :</label>
    <textarea name="adresse" id="adresse" required>{{ $pharmacie->adresse }}</textarea>

    <label for="telephone">Téléphone :</label>
    <input type="text" name="telephone" id="telephone" value="{{ $pharmacie->telephone }}">

    <button type="submit">Mettre à jour</button>
</form>
