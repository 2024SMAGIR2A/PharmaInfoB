<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détails de la Pharmacie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
</head>
<body>
  <div class="card">
    <div class="card-header">
      <h2>
        <?php if ($pharmacie->est_de_garde) : ?>
          {{ $pharmacie->nom }} 🟢
        <?php else : ?>
          {{ $pharmacie->nom }}
        <?php endif; ?>
      </h2>
      <a href="{{ route('pharmacies.index') }}">Retour à la liste</a>
      <div class="d-flex justify-content-end">  <button type="button" class="btn btn-secondary mx-1" data-bs-toggle="modal" data-bs-target="#addReviewModal">
          <i class="fas fa-comment-dots"></i> Ajouter un avis
        </button>
        <button type="button" class="btn btn-primary" id="addToFavoritesBtn">
          <i class="fas fa-star"></i> Marquer en favoris
        </button>
      </div>  </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 py-3">
          <p><strong>Adresse :</strong> {{ $pharmacie->adresse }}</p>
          <p><strong>Téléphone :</strong> {{ $pharmacie->telephone }}</p>
          <p><strong>Horaires :</strong> {{ $pharmacie->horaires_ouverture }}</p>
          <p><strong>Services :</strong> {{ $pharmacie->services_offerts }}</p>
          <p><strong>Moyens de paiements acceptés :</strong> {{ $pharmacie->moyens_paiement }}</p>

        </div>
        <div class="col-md-6">
          <div id="map" style="height: 300px; width:100%;"></div>
          <button id="btn-directions" class="btn btn-primary mt-3">Itinéraire</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addReviewModalLabel">Ajouter un avis</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" form="your-review-form-id" class="btn btn-primary">Envoyer</button>  </div>
      </div>
    </div>
  </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        // Récupérer la latitude et la longitude de la pharmacie depuis PHP
        var latitude = {{ $pharmacie->latitude }};
        var longitude = {{ $pharmacie->longitude }};

        // Initialiser une carte avec Leaflet
        var map = L.map('map').setView([latitude, longitude], 13);

        // Ajouter un marqueur à la position de la pharmacie
        L.marker([latitude, longitude]).addTo(map);

        // Ajouter un tile layer (carte de fond)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Obtenir la position de l'utilisateur (à remplacer par votre méthode)
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLat = position.coords.latitude;
            var userLng = position.coords.longitude;

            // Ajouter un bouton pour calculer l'itinéraire
            document.getElementById('btn-directions').addEventListener('click', function() {
                var directionsUrl = 'https://www.google.com/maps/dir/?api=1&origin=' + userLat + ',' + userLng + '&destination=' + latitude + ',' + longitude;
                window.location.href = directionsUrl;
            });
        });
    </script>
</body>
</html>