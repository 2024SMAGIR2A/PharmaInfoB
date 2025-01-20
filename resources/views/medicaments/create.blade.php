<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'Inscription d'une Pharmacie</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/your_fontawesome_kit_id.js" crossorigin="anonymous"></script>
  <style>
    .card-header {
      background-color: #0d6aad;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="card mx-auto">
      <div class="card-header">
        <h4 class="card-title">Ajout d'un medicament</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('medicaments.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label for="medicamentName" class="form-label">Nom du médicament</label>
                <input type="text" class="form-control" name="medicamentName" id="medicamentName" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></script>
</body>
</html>