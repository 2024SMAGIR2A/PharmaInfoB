<h1>{{ $pharmacie->nom }}</h1>
<p><strong>Adresse :</strong> {{ $pharmacie->adresse }}</p>
<p><strong>Téléphone :</strong> {{ $pharmacie->telephone }}</p>
<p><strong>horaires_ouverture :</strong> {{ $pharmacie->horaires_ouverture }}</p>
<p><strong>est_de_garde :</strong> {{ $pharmacie->est_de_garde }}</p>
<a href="{{ route('pharmacies.index') }}">Retour à la liste</a>
