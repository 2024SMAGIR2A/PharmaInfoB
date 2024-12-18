<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href="{{ url('/') }}">
            <span class="ms-1 text-sm text-dark">PHARMACIE INFO B</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active bg-gradient-dark text-white" href="{{ url('dashboard') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('users') }}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Utilisateurs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('pharmacies') }}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Pharmacies</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('medicaments') }}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Médicaments</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('avis') }}">
                    <i class="material-symbols-rounded opacity-5">receipt_long</i>
                    <span class="nav-link-text ms-1">Avis</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
