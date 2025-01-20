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
        <h4 class="card-title">Faire une entrée en stock </h4>
      </div>
      <div class="card-body">
        <form action="{{ route('medicaments.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="medicamentName" class="form-label">Nom du médicament</label>
                {{-- <input type="text" class="form-control" name="medicamentName" id="medicamentName" value="{{medoc.nom}}" disabled required> --}}
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $medicament->nom) }}" required>

              </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                  <label for="searchInput" class="form-label">Recherchez la Pharmacie</label>
                  <input 
                      class="form-control" 
                      list="optionsList" 
                      id="searchInput" 
                      name="pharmacie" 
                      placeholder="Tapez pour rechercher..." 
                  />
                  <datalist id="optionsList" name="pharmacie">
                      @foreach ($pharmacies as $pharmacie)
                          <option value="{{ $pharmacie->nom }}">{{$pharmacie->nom}}</option>
                      @endforeach
                  </datalist>
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="mb-4">
                <label for="qteStock" class="form-label">Quantité entrée </label>
                <input type="number" class="form-control" name="qteStock" id="qteStock">
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