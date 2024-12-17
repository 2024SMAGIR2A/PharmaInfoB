<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/your_fontawesome_kit_id.js" crossorigin="anonymous"></script>

<div class="container my-4">
    <h2 class="text-center text-dark">Rechercher une pharmacie</h2>
    <form action="{{ route('pharmacies.search') }}" method="GET" class="d-flex justify-content-center">
        <div class="input-group w-70 mx-auto rounded-lg shadow-sm">
            <span class="input-group-text bg-white border-0 rounded-l-lg">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" name="query" class="form-control border-1 rounded-r-lg" placeholder="Entrez le nom ou la zone.." aria-label="Recherche" />
        </div>
    </form>
</div>