<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de Modification d'une Pharmacie</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/your_fontawesome_kit_id.js" crossorigin="anonymous"></script>
  <style>
    .card-header {
      background-color: #ce7e00;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="card mx-auto">
      <div class="card-header">
        <h4 class="card-title">Modification de la Pharmacie</h4>
      </div>
      <div class="card-body">
        <!-- Utilisez la méthode PUT pour la modification -->
        <form action="{{ route('pharmacies.update', $pharmacie->id_pharmacie) }}" method="POST">
    @csrf
    @method('PUT') <!-- Indique que cette requête est une modification -->
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="pharmacyName" class="form-label">Nom de la pharmacie</label>
                <input type="text" class="form-control" name="nom" id="pharmacyName" value="{{ old('nom', $pharmacie->nom) }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="address" value="{{ old('adresse', $pharmacie->adresse) }}" required>
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" name="telephone" id="telephone" value="{{ old('telephone', $pharmacie->telephone) }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="openingHours" class="form-label">Horaires d'ouverture</label>
                <textarea class="form-control" name="horaires_ouverture" id="openingHours" rows="3" required>{{ old('horaires_ouverture', $pharmacie->horaires_ouverture) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="servicesOffered" class="form-label">Services proposés</label>
                <textarea class="form-control" name="services_offerts" id="servicesOffered" rows="3" required>{{ old('services_offerts', $pharmacie->services_offerts) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="paymentMethods" class="form-label">Moyens de paiement</label>
                <input type="text" class="form-control" name="moyens_paiement" id="paymentMethods" value="{{ old('moyens_paiement', $pharmacie->moyens_paiement) }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="isOnCall" class="form-label">De garde</label>
                <select class="form-select" name="est_de_garde" id="isOnCall">
                    <option value="1" {{ $pharmacie->est_de_garde == 1 ? 'selected' : '' }}>Oui</option>
                    <option value="0" {{ $pharmacie->est_de_garde == 0 ? 'selected' : '' }}>Non</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="number" step="any" name="latitude" class="form-control" id="latitude" value="{{ old('latitude', $pharmacie->latitude) }}" required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="number" step="any" name="longitude" class="form-control" id="longitude" value="{{ old('longitude', $pharmacie->longitude) }}" required>
            </div>
            <div class="mb-3">
                <label for="pharmacistId" class="form-label">ID du pharmacien</label>
                <input type="number" class="form-control" name="id_pharmacien" id="pharmacistId" value="{{ old('id_pharmacien', $pharmacie->id_pharmacien) }}" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-warning">Mettre à jour</button>
</form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></script>
</body>
</html>